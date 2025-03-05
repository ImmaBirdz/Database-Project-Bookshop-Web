<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // it contains book_id, book_title, book_category, book_price, book_status
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
}
