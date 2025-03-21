<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ApplicationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /*public function newApp()
    {
        return view('client.new_app');
    }
    public function store(ApplicationRequest $request)
    {
        $app=Application::create($request->all()+[
            'status'=>1,
            'user_id'=>Auth::id()
        ]);
        if($app) return redirect()->route('client.index');
        return back()->withErrors('Ошибка сохранения');
    }

    public function confirm (Request $request, $id){
        $app=Application::find($id);
        $app->update($request->all()+[
            'status'=>2
        ]);
        return redirect()->route('admin.index');
    }

    public function cancel (Request $request, $id){
        $app=Application::find($id);
        $app->update($request->all()+[
            'status'=>3
        ]);
        return redirect()->route('admin.index');
    }*/
}
