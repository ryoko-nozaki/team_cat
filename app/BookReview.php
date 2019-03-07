<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    /**
     * モデルと関係しているテーブル
     *
     * @var string
     */
    protected $table = 'book_review';
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User', 'reviewer_id');
    }
}
