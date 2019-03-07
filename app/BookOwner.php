<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookOwner extends Model
{
    protected $table = 'book_owner';

    public function book()
    {
        return $this->belongsTo('App\Books', 'book_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
