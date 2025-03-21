<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function login(){
        return view('user.login');
    }
    public function reg(){
        return view('user.reg');
    }
    public function auth(Request $request){
        if($user=User::where('login', $request->login)->first() and Hash::check($request->password,$user->password)){
            Auth::login($user);
            if (Auth::user()->role==1 ) return redirect()->route('admin.index');
            return redirect()->route('client.index');
        }
        return back()->withErrors('Неверный логин или пароль');
    }
    public function logout(){
        Auth::logout();
        return view('main');
    }
    public function store(UsersRegisterRequest $request)
    {
        if (User::where('login', $request->login)->exists() || User::where('email', $request->email)->exists()) {
            return back()->withErrors('Пользователь с таким логином или email уже зарегистрирован');
        }

        $data = [
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath; 
        }

        $user = User::create($data);


        if ($user) {
            return redirect()->route('login');
        }

        return back()->withErrors('Ошибка сохранения');
    }
    
}