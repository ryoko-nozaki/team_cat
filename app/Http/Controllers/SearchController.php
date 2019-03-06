<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class SearchController extends Controller
{
    private $pagination_number = 9;

    public function index(Request $request)
    {
        $q = $request->input('q');
        if (isset($q)) {
            $books = (new Books())
                ->where('title', 'like', '%' . $q . '%')
                ->orWhere('author', 'like', '%' . $q . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate($this->pagination_number);
        } else {
            $books = Books::orderBy('updated_at', 'desc')->paginate($this->pagination_number);
        }
        return view('search')->with('books', $books);
    }
}
