<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    public $timestamps = false;

    protected $fillable = [
        'name',
        'login',
        'email',
        'password',
        'avatar'
    ];

    public function isAdmin()
    {
        if ($this->role == 1) return true;
    }
    public function hasVoted(Form $form)
    {
        return $this->votes()->where('id_form', $form->id)->exists();
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_user');
    }
}
