<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $primaryKey = 'wishlist_id';
    protected $fillable = [
        'wishlist_id',
        'book_id',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
