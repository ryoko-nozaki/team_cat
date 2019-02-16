@extends("layouts.layout")

@section("css")
<link rel="stylesheet" href="/css/search.css">
@endsection

@section("js")
<script src="/js/search.js"></script>
@endsection

@section("content")
<div class="content">
    <form action="/search" method="POST">
        {{csrf_field()}}
        <div class="mt-4">
            <label>検索ワードを入れてください</label><br>
            <input type="text" name="word" />
            <input type="submit" value="検索" />
        </div>
    </form>
@isset($res)
    @if($res['totalItems'] === 0)
    <div class="row mt-5">本が見つかりませんでした</div>
    @else
    <div class="row mt-5">
        @foreach($res["items"] as $book)
        <div class="col-md-4 pt-4">
            @isset($book['volumeInfo']['imageLinks']['thumbnail'])
            <img class="mx-auto d-block img-fluid" src="{{$book['volumeInfo']['imageLinks']['thumbnail']}}" />
            @else
            <img class="mx-auto d-block img-fluid" src="/img/no_img.png" />
            @endisset
            <div class="mt-5">タイトル：{{$book["volumeInfo"]["title"]}}</div>
            @isset($book['volumeInfo']['authors'])
            <div>著者</div>
                <ul>
                @foreach($book['volumeInfo']['authors'] as $author)
                    <li>{{$author}}</li>
                @endforeach
                </ul>
                @else
            <div>著者が見つかりません</div>
                @endisset
        </div>
        @endforeach
    </div>
    @endif
@endisset
</div>
@endsection