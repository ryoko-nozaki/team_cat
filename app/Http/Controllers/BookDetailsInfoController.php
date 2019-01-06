<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Book;
use App\BookOwner;
use App\BookReview;

class BookDetailsInfoController extends Controller
{
    public function index($bookId=null) {
        $userId = Auth::id();
        $book = Book::find($bookId);
        $owners = BookOwner::where('book_id', $bookId)->get();
        $reviews = BookReview::where('book_id', $bookId)->get();
        $param = [
            'userId'    => $userId,
            'book'    => $book,
            'owners'  => $owners,
            'reviews' => $reviews
        ];
        return view('bookDetailsInfo.index', $param);
    }

    public function createReview(Request $request)
    {
        $bookReview = new BookReview;
        $form = $request->all();
        unset($form['_token']);
        $bookReview->fill($form)->save();

        return redirect()->route('book', ['bookId' => $request->book_id]);
    }

    public function removeReview(Request $request)
    {
        BookReview::find($request->review_id)->delete();

        return redirect()->route('book', ['bookId' => $request->book_id]);
    }
}
