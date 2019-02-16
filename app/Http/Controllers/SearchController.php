<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //dd(DB::table('books')->where('books.isbn', 111));
        return view('search');
    }

    public function post(Request $request)
    {
        $word = $request->input("word");
        if ($word) {
            $res = $this->getBookDataFromApi($word);
        }

        //$this->addBooksCount($res);

        return view('search', compact('res'));
    }

    public function addBooksCount($api_data)
    {
        foreach ($api_data['items'] as &$book_data) {
            $db = DB::table('books')->where('books.isbn', 111);
            if ($db) {
                $db->leftJoin('book_owner', 'books.id', 'book_owner.book_id');
                $all_count = $db->count();
                $remaining_count = $db->where('book_owner.loan_status', 0)->count();
            }
        }
    }

    // google books api から情報を取得
    public function getBookDataFromApi($word)
    {
        // isbnコードか判定
        if (preg_match('/^(\d{10}|\d{13})$/', $word) === 1) {
            $word = 'isbn:' . $word;
        }

        $curl = curl_init();
        $url = "https://www.googleapis.com/books/v1/volumes?q=" . $word;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);

        if ($info["http_code"] !== 200) {
            redirect('/search')->throwResponse();
        }

        return json_decode($res, true);
    }
}
