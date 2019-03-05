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
    public function index(Request $request)
    {
        $loan_status = $request->input('loan_status');
        if(isset($loan_status)){
            $book_owner_id = $request->input('book_owner_id');
            $this->permission($book_owner_id, $loan_status);
        }
        
        $user = Auth::user();
        
        $loan = \DB::table('loan')
               ->select('loan.*', 'books.title as title', 'users.name as borrower_name', 'book_owner.loan_status', 'book_owner.id as book_owner_id')
               ->leftjoin('books','loan.book_id','=','books.id')
               ->leftjoin('users','loan.borrower_id','=','users.id')
               ->leftjoin('book_owner',function($join){
                 $join->on('loan.owner_id','=','book_owner.owner_id')
                 ->on('book_owner.book_id', '=', 'books.id');
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

    public function permission($book_owner_id, $loan_status)
    {        
        DB::table('book_owner')
            ->where('id', $book_owner_id)
            ->update(['loan_status' => $loan_status]);
    }
}


