<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'book_id';
    protected $fillable = [
        'book_id',
        'book_title',
        'book_category',
        'book_price',
        'book_status',
    ];

    protected $casts = [
        'book_status' => 'boolean',
    ];

    protected $attributes = [
        'book_status' => true,
    ];

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
