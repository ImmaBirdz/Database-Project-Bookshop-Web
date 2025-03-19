<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id';
    protected $fillable = [
        'cart_id',
        'book_id',
        'user_id',
        'quantity',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
