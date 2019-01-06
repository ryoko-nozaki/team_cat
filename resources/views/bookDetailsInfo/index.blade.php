@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div align="center">
                <img alt="thumbnail" src="{{$book->thumbnail}}" class="img-thumbnail"  width="50%" height="50%"/>
            </div>
            <form>
                <div classnm="form-group center-block">
                    <label for="number" class="control-label col-xs-2">所持者</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="number" name="number">
                            @foreach ($owners as $owner)
                                <option value="{{$owner->id}}">{{$owner->user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">貸出申請</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">所持登録</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">{{$book->title}}</h3>
            <p>
                {{$book->description}}
            </p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="comment">レビュー</label>
                        <form role="form" action="/book/createReview" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="book_id" value="{{$book->id}}">
                            <input type="hidden" name="reviewer_id" value="{{$userId}}">
                            <textarea class="form-control" rows="5" name="review"></textarea>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                    </div>
                    @foreach ($reviews as $review)
                        <div class="card">
                            <h5 class="card-header">
                                {{$review->user->name}}
                            </h5>
                            <div class="card-body">
                                <p class="card-text">
                                    {{$review->review}}
                                </p>
                            </div>
                            @if ($userId == $review->reviewer_id)
                                <div class="card-footer">
                                    <form action="/book/removeReview" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="review_id" value="{{$review->id}}">
                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                        <button type="submit" class="btn btn-primary">削除</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
