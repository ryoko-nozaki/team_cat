<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';

    public function owner()
    {
        return $this->hasMany('App\BookOwner', 'book_id');
    }

    public function loan()
    {
        return $this->hasMany('App\Loan', 'book_id');
    }

    public function countAllBook()
    {
        return $this->hasMany('App\BookOwner', 'book_id')->count();
    }

    public function countLendableBook()
    {
        return $this->hasMany('App\BookOwner', 'book_id')->where('loan_status', 2)->count();
    }
}
