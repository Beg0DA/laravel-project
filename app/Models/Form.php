<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'form'; // Specify the table name
    public $timestamps = false;
    protected $fillable = [
        'name',
        'status',
    ];

    public function choices()
    {
        return $this->hasMany(Choice::class, 'id_form');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_form'); 
    }

}