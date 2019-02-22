<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 

use App\Books;
use App\BookOwner;
use App\Loan;

class LoanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        $loan = \DB::table('loan')
               ->select('loan.*', 'books.title as title', 'users.name as borrower_name', 'book_owner.loan_status')
               ->leftjoin('books','loan.book_id','=','books.id')
               ->leftjoin('users','loan.borrower_id','=','users.id')
               // ->leftjoin('book_owner','loan.owner_id','=','book_owner.owner_id')
               ->leftjoin('book_owner',function($join){
                 $join->on('loan.owner_id','=','book_owner.owner_id')
                 ->where('book_owner.book_id', '=', 'books.id');
               })
               ->where('loan.owner_id', $user['id'])
               ->orderBy('loan.id')
               ->get();
        $loan = json_decode(json_encode($loan), true);

        foreach($loan as $key => $val)
        {
            $val['title'] = mb_strimwidth($val['title'], 0, 20, "...");
            $val['loan_date'] = mb_substr($val['loan_date'],0,4)."/".substr($val['loan_date'],5,2)."/".substr($val['loan_date'],8,2);
            $val['return_date'] = mb_substr($val['return_date'],0,4)."/".substr($val['return_date'],5,2)."/".substr($val['return_date'],8,2);
            
            $data['loan'][] = $val;
        }
        return view('loan', $data);
    }
}
