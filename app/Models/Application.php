<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $fillable = [
        'gosRegNumber',
        'description',
        'status',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getStatus(){
        if ($this->status == 2) return 'Подтверждён';
        if ($this->status == 3) return 'Отменён';
        return 'Новый';
    }
}
