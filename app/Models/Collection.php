<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $primaryKey = 'collection_id';
    protected $fillable = [
        'collection_id',
        'user_id',
        'book_id',
        'quantity'
    ];
    
    public function users(){
        return $this->belongsTo(User::class);
    }
    
    public function books(){
        return $this->hasMany(Book::class);
    }
}
