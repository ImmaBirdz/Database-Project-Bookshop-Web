<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'order_detail_id';
    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
        'price',
    ];

    public function orders(){
        return $this->belongsTo(Order::class);
    }

    public function books(){
        return $this->belongsTo(Book::class);
    }
}
