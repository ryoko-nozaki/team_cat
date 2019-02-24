<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * モデルと関係しているテーブル
     *
     * @var string
     */
    protected $table = 'books';
    protected $guarded = array('id');
}
