<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'name'=>'required','string','max:30',
            'login'=>'required','string','max:30',
            'email'=>'required','string','max:30',
            'password'=>'required','string','max:60',
            'avatar'=>'required','string','max:100'
        ];
    }
}
