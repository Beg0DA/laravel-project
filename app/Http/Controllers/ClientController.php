<?php

namespace App\Http\Controllers;

use App\Application;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $user=User::where('id',Auth::id())->first();
        $votes = $user->votes()->with('form', 'choice')->get();
        return view('client.index', compact('user','votes'));
    }

    public function forms(){
        $user=User::where('id',Auth::id())->first();
        return view('client.forms', compact('user'));
    }
}
