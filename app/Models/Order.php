<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    protected $keyType = 'string';
    protected $fillable = [
        'order_id',
        'user_id',
        'order_date',
        'order_status',
        'total',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
