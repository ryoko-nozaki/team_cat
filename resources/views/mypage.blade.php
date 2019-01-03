@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<ul class="nav flex-column text-center">
				<li class="nav-item">
					<a class="nav-link" href="#">書籍登録</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">貸出許可</a>
				</li>
			</ul>
		</div>
		<div class="col-md-10">
			<div class="alert alert-secondary" role="alert">
				<strong>お知らせ</strong></br>書籍を貸し出しました。
			</div>
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