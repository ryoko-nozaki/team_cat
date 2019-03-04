<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookSearchController extends Controller
{
    public function show(Request $request)
    {
        $isbn = $request->input('isbn');
        $options = [
            CURLOPT_URL => 'https://www.googleapis.com/books/v1/volumes?q=isbn:' . $isbn,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        ];
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $res = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($res, true);
        var_dump($res);

        return response()->json(
            'test'
        );
    }
}
