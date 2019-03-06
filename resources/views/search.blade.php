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
            <a href="/book/{{ $book->id }}">
            @if($book->thumbnail)
                <img class="mx-auto d-block" src="{{ $book->thumbnail }}" />
            @else
                <img class="mx-auto d-block" src="/img/no_img.png" />
            @endif
            </a>

            <div class="mt-5">タイトル：{{ $book->title }}</div>

            @if($book->author)
                <div>著者：{{ $book->author }}</div>
            @else
                <div>著者が見つかりませんでした</div>
            @endif

            <div>冊数：{{ $book->countLendableBook() }}/{{ $book->countAllBook() }}冊</div>
        </div>
    @endforeach
    </div>

    <div class="pager">
        {{ $books->links() }}
    </div>
</div>

<script src="/js/search.js" defer></script>
@endsection
