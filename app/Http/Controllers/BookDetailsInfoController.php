<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookDetailsInfoController extends Controller
{
    public function index($booksId) {
        return view('bookDetailsInfo.index');
    }
}
