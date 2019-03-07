@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('sidebar')
		<div class="col-md-9">
			<h3>所持書籍一覧</h3>
			<div class="row">
			@foreach($owned_list as $owned)
				<div class="col-md-4 mb-5">
					<div class="card">
						@if($owned->book->thumbnail)
							<img class="card-img-top" src="{{ $owned->book->thumbnail }}" width="300" height="150">
						@else
							<img class="card-img-top" src="/img/no_img.png" width="300" height="150">
						@endif
						<div class="card-block">
							<h5 class="card-title">{{ $owned->book->title }}</h5>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
