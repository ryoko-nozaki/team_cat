<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loan';

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function borrower()
    {
        return $this->belongsTo('App\User', 'borrower_id');
    }

    public function book()
    {
        return $this->belongsTo('App\Books', 'book_id');
    }

    public function fetchDate()
    {
        $start = date('m月d日', strtotime($this->loan_date));
        $ended = date('m月d日', strtotime($this->return_date));
        return $start . "〜" . $ended;
    }

    public function fetchStatus()
    {
        $status = $this->status;
        if ($status === 0) {
            return "申請中";
        } elseif ($status === 1) {
            return "OK";
        } elseif ($status === 2) {
            return "NG";
        }
    }
}
