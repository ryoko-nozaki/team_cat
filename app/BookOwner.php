<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookOwner extends Model
{
    protected $table = 'book_owner';
    protected $primaryKey = 'id';
    
    public function books() {

        return $this->belongsTo('App\Books', 'id');

    }
}
