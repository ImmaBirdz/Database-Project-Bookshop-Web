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
    
    public function authors(){
        return $this->belongsTo(Author::class);
    }

    public function publishers(){
        return $this->belongsTo(Publisher::class);
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function collections(){
        return $this->hasMany(Collection::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
