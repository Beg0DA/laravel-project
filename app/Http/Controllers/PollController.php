<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $activePolls = Form::where('status', 'active')->with('choices')->get();
        $finishedPolls = Form::where('status', 'finished')->with('choices')->get();

        return view('client.forms', compact('activePolls', 'finishedPolls', 'user'));
    }

    public function vote(Request $request, Form $form)
    {
        $validated = $request->validate([
            'choice' => 'required|exists:choices,id',
        ]);

        $user = User::where('id', Auth::id())->first();
        if ($user && $user->hasVoted($form)) {
            return redirect()->back()->with('error', 'Вы уже голосовали в этом опросе.');
        }

        Vote::create([
            'id_user' => $user->id,
            'id_form' => $form->id,
            'id_choice' => $validated['choice'],
        ]);



        return redirect()->back()->with('success', 'Ваш голос учтен!');
    }
}
