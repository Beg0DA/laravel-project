<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Choice;

class FormController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'form_name' => 'required|string|max:50',
            'choices' => 'required|array',
            'choices.*' => 'string|max:255',
        ]);

        $form = new Form;
        $form->name = $validatedData['form_name'];
        $form->status = 'active';
        $form->save();

        foreach ($validatedData['choices'] as $choiceText) {
            if (!empty($choiceText)) {
                $choice = new Choice;
                $choice->choice = $choiceText;
                $choice->id_form = $form->id;
                $choice->save();
            }
        }

        return redirect()->back()->with('success', 'Poll created successfully!');
    }
}
