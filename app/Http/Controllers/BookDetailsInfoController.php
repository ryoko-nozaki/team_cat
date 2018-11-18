<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class BookDetailsInfoController extends Controller
{
    public function index($bookId=null) {
        $user = Auth::user();
        $param = ['user' => $user];
        return view('bookDetailsInfo.index', $param);
    }
}
