<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $primaryKey = 'author_id';
    protected $fillable = [
        'author_id',
        'author_name',
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }
}
