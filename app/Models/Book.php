<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
  
}
