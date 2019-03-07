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
        $apply_list = Loan::where('owner_id', $user->id)->get();
        return view('loan')->with('apply_list', $apply_list);
    }

    public function register(Request $request)
    {
        if ($request->has('loan_status')) {
            $this->saveLoanStatus($request->input('id'), $request->input('loan_status'));
        } elseif ($request->has('return_status')) {
            $this->saveReturnStatus($request->input('id'), $request->input('return_status'));
        }

        return $this->index();
    }

    private function saveLoanStatus($id, $status)
    {
        if ($status === 'OK') {
            $status = 1;
        } elseif ($status === 'NG') {
            $status = 2;
        } else {
            $status = 0;
        }

        $fetch_entity = Loan::find($id);
        $fetch_entity->status = $status;
        $fetch_entity->save();
    }

    private function saveReturnStatus($id, $status)
    {
        $fetch_entity = Loan::find($id);
        $fetch_entity->return_o = $status;
        $fetch_entity->save();
    }
}
