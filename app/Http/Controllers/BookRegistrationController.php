<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Book;
use App\BookOwner;
use App\BookReview;

class BookRegistrationController extends Controller
{
    public function show()
    {
        return view('book_registration.register');
    }

    public function create(Request $request)
    {
        $book = new Book;
        $bookOwner = new BookOwner;
        $form = $request->all();
        $book->fill([
            'title' => $form['title'],
            'isbn' => $form['isbn'],
            'author' => $form['author'],
            'description' => $form['description'],
            'thumbnail' => $form['thumbnail']
        ])->save();
        $bookOwner->fill([
            'book_id' => $book->id,
            'owner_id' => Auth::id(),
            'loan_status' => 0
        ])->save();

        if (!is_null($form['review'])) {
            $bookReview = new BookReview;
            $bookReview->fill([
                'book_id' => $book->id,
                'reviewer_id' => Auth::id(),
                'review' => $form['review']
            ])->save();
        }

        return redirect()->route('mypage');
    }
}
