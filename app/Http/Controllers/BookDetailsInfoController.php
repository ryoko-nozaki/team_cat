<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Book;
use App\BookOwner;
use App\BookReview;
use App\Loan;

class BookDetailsInfoController extends Controller
{
    public function index($bookId = null)
    {
        $userId = Auth::id();
        $book = Book::find($bookId);
        $owners = BookOwner::where('book_id', $bookId)->get();
        $reviews = BookReview::where('book_id', $bookId)->get();
        $loan_flg = Loan::where('book_id', $bookId)
            ->where('borrower_id', $userId)
            ->where('status', 0)
            ->count();
        $posession_flg = BookOwner::where('book_id', $bookId)
            ->where('owner_id', $userId)
            ->count();
        $param = [
            'userId'    => $userId,
            'book'    => $book,
            'owners'  => $owners,
            'reviews' => $reviews,
            'loan_flg' => $loan_flg,
            'posession_flg' => $posession_flg
        ];
        return view('book_details_info.index', $param);
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

    public function applyLoan(Request $request)
    {
        $loan = new Loan;
        $loan->fill([
            'borrower_id' => Auth::id(),
            'owner_id' => $request->owner_id,
            'book_id' => $request->book_id,
            'status' => 0,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date
        ])->save();

        return redirect()->route('book', ['bookId' => $request->book_id]);
    }

    public function applyPosession(Request $request)
    {
        $bookOwner = new BookOwner;
        $bookOwner->fill([
            'book_id' => $request->book_id,
            'owner_id' => Auth::id(),
            'loan_status' => 0
        ])->save();

        return redirect()->route('book', ['bookId' => $request->book_id]);
    }
}
