<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Loan;

class ApplyingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $loans = Loan::where("borrower_id", $user->id)->get();
        return view('applying')->with('loans', $loans);
    }
}
