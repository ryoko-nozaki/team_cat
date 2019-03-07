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

    public function register(Request $request)
    {
        $fetch_entity = Loan::find($request->input('id'));
        $fetch_entity->return_a = $request->input('return_status');
        $fetch_entity->save();
        return $this->index();
    }
}
