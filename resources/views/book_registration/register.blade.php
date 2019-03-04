@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bookRegist') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('isbn') }}</label>

                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" required autofocus>
                            </div>
                            <button type="button" id="search_book" class="btn btn-default">
                                {{ __('検索') }}
                            </button>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('著者') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" value="{{ old('author') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="review" class="col-md-4 col-form-label text-md-right">{{ __('レビュー') }}</label>

                            <div class="col-md-6">
                                <textarea id="review" class="form-control" name="review">{{ old('review') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
