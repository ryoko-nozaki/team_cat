@extends("layouts.app")

@section("content")
<link rel="stylesheet" href="/css/search.css">
<div class="container-fluid">
    <form action="/search" method="GET">
        {{ csrf_field() }}
        <div class="mx-5">
            <label>検索ワードを入れてください</label><br>
            <input type="text" name="q" />
            <input type="submit" value="検索" />
        </div>
    </form>

    <div class="row mt-5">
    @foreach($books as $book)
        <div class="col-4 pt-4">
            @if($book->thumbnail)
                <img class="mx-auto d-block img-fluid" src="{{ $book->thumbnail }}" />
            @else
                <img class="mx-auto d-block img-fluid" src="/img/no_img.png" />
            @endif

            <div class="mt-5">タイトル：{{ $book->title }}</div>

            @if($book->author)
                <div>著者：{{ $book->author }}</div>
            @else
                <div>著者が見つかりませんでした</div>
            @endif
        </div>
    @endforeach
    </div>

    <div class="mx-5 mt-5">
        {{ $books->links() }}
    </div>
</div>

<script src="/js/search.js" defer></script>
@endsection
