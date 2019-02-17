<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        if (isset($q)) {
            $books = DB::table('books')
                ->where('title', 'like', '%' . $q . '%')
                ->orWhere('author', 'like', '%' . $q . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate(9);
        } else {
            $books = DB::table('books')->orderBy('updated_at', 'desc')->paginate(9);
        }
        return view('search')->with('books', $books);
    }
}
