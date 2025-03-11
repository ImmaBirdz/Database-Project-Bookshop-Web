<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'quantity',
    ];

    public function users(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function books(){
        return $this->belongsTo(\App\Models\Book::class);
    }
}
