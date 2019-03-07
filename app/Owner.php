<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\Books', 'book_id');
    }
}
