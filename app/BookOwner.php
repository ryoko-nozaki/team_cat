<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookOwner extends Model
{
    protected $table = 'book_owner';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function books() {

        return $this->belongsTo('App\Books', 'book_id');

    }

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
