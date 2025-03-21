<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $user = User::where('id', Auth::id())->first();

        /*$apps=Application::orderBy('status')->orderByDesc('created_at')->get();*/

        return view('admin.index', compact('user'));
    }

    public function new_form()
    {
        $user = User::where('id', Auth::id())->first();

        return view('admin.new_form', compact('user'));
    }

    public function forms()
    {
        $user = User::where('id', Auth::id())->first();

        return view('admin.forms', compact('user'));
    }

    public function form_create()
    {
        $user = User::where('id', Auth::id())->first();

        return redirect()->route('admin.index');
    }

    public function form_finish(Form $form)
    {
        $form->status = 'finished';
        $form->save();

        return redirect()->back()->with('success', 'Голосование завершено!');
    }
}
