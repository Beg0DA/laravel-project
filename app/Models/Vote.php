<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_form',
        'id_choice',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function form()
    {
        return $this->belongsTo(Form::class, 'id_form');
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class, 'id_choice');
    }
}