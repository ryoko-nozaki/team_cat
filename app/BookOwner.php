<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookOwner extends Model
{
    /**
     * モデルと関係しているテーブル
     *
     * @var string
     */
    protected $table = 'book_owner';
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
