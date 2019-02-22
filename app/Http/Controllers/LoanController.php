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
               ->leftjoin('book_owner','loan.owner_id','=','book_owner.owner_id')
               ->where('loan.owner_id', $user['id'])
               ->orderBy('loan.id')
               ->get();
        $loan = json_decode(json_encode($loan), true);
        /*
        select `loan`.*, `books`.`title` as `title`, `users`.`name` as `borrower_name`, `book_owner`.`loan_status` 
        from `loan` left join `books` on `loan`.`book_id` = `books`.`id` 
          left join `users` on `loan`.`borrower_id` = `users`.`id` 
          left join `book_owner` on `loan`.`owner_id` = `book_owner`.`owner_id` 
        where `loan`.`owner_id` = 2 
        order by `loan`.`id` asc\G
        */

/*
        $owner = \DB::table('book_owner')
               ->where('owner_id', $user['id'])
               ->get();
        $owner = json_decode(json_encode($owner), true);
*/

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
/*

array(4) { 
	[0]=> array(11) { ["id"]=> int(1) ["borrower_id"]=> int(1) ["owner_id"]=> int(2) ["book_id"]=> int(5) 
	["loan_date"]=> string(19) "2019-02-07 00:00:00" ["return_date"]=> string(19) "2019-02-20 00:00:00" ["updated_at"]=> string(19) "2019-02-09 06:45:58" ["created_at"]=> string(19) "2019-02-09 06:45:58" 
	["title"]=> string(20) "testtesttesttesttest" ["borrower_name"]=> string(9) "テスト" ["loan_status"]=> int(0) 
	} 
	[1]=> array(11) { ["id"]=> int(1) ["borrower_id"]=> int(1) ["owner_id"]=> int(2) ["book_id"]=> int(5) ["loan_date"]=> string(19) "2019-02-07 00:00:00" ["return_date"]=> string(19) "2019-02-20 00:00:00" ["updated_at"]=> string(19) "2019-02-09 06:45:58" ["created_at"]=> string(19) "2019-02-09 06:45:58" ["title"]=> string(20) "testtesttesttesttest" ["borrower_name"]=> string(9) "テスト" ["loan_status"]=> int(0) } [2]=> array(11) { ["id"]=> int(3) ["borrower_id"]=> int(1) ["owner_id"]=> int(2) ["book_id"]=> int(1) ["loan_date"]=> string(19) "2019-02-07 00:00:00" ["return_date"]=> string(19) "2019-02-20 00:00:00" ["updated_at"]=> string(19) "2019-02-09 06:49:39" ["created_at"]=> string(19) "2019-02-09 06:49:39" ["title"]=> string(11) "PHP Laravel" ["borrower_name"]=> string(9) "テスト" ["loan_status"]=> int(0) } [3]=> array(11) { ["id"]=> int(3) ["borrower_id"]=> int(1) ["owner_id"]=> int(2) ["book_id"]=> int(1) ["loan_date"]=> string(19) "2019-02-07 00:00:00" ["return_date"]=> string(19) "2019-02-20 00:00:00" ["updated_at"]=> string(19) "2019-02-09 06:49:39" ["created_at"]=> string(19) "2019-02-09 06:49:39" ["title"]=> string(11) "PHP Laravel" ["borrower_name"]=> string(9) "テスト" ["loan_status"]=> int(0) } }

*/
