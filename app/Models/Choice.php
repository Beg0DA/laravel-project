<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $table = 'choices'; // Specify the table name
    public $timestamps = false;
    protected $fillable = [
        'choice',
        'id_form',
    ];


    public function form()
    {
        return $this->belongsTo(Form::class, 'id_form');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_choice');
    }

}