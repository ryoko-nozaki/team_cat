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
        if ($res['totalItems'] == 0) {
            $json = ['status' => 'false'];
        } else {
            $json = [
                'status' => 'true',
                'title' => $res['items'][0]['volumeInfo']['title'],
                'author' => $res['items'][0]['volumeInfo']['authors'][0],
                'description' => $res['items'][0]['volumeInfo']['description'],
                'thumbnail' => $res['items'][0]['volumeInfo']['imageLinks']['thumbnail']
            ];
        }

        return response()->json($json);
    }
}
