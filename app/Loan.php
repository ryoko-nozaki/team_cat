<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loan';
    protected $guarded = ['id'];
    protected $primaryKey = 'book_id';

    public function book() {

        return $this->hasMany('App\Book', 'id');

    }

}
