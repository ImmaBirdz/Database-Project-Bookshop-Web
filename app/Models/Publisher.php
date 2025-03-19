<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $primaryKey = 'publisher_id';
    protected $fillable = [
        'publisher_id',
        'publisher_name',
        'publisher_address',
        'publisher_phone',
    ];

    public function books(){
        return $this->belongsTo(Book::class);
    }
}
