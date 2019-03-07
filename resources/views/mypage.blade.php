@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('sidebar')
		<div class="col-md-9">
			<h3>
				所持書籍一覧
			</h3>
			@foreach($books as $key => $var)
				@if($key % 3  == 0)
					<div class="row">
						<div class="col-md-4">
							<div class="card">
								<img class="card-img-top" alt="Bootstrap Thumbnail First" style="" src="{{$var['books']['thumbnail']}}">
								<div class="card-block">
									<h5 class="card-title">
										{{$var['books']['title']}}
									</h5>
								</div>
							</div>
						</div>
				@elseif($key % 3  == 2)
						<div class="col-md-4">
							<div class="card">
								<img class="card-img-top" alt="Bootstrap Thumbnail Second" src="{{$var['books']['thumbnail']}}">
								<div class="card-block">
									<h5 class="card-title">
										{{$var['books']['title']}}
									</h5>
								</div>
							</div>
						</div>
					</div>
				</br>
				@else
						<div class="col-md-4">
							<div class="card">
								<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="{{$var['books']['thumbnail']}}">
								<div class="card-block">
									<h5 class="card-title">
										{{$var['books']['title']}}
									</h5>
								</div>
							</div>
						</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
@endsection
