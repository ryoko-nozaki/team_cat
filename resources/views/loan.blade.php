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
					<a class="nav-link" href="{{ route('loan') }}">貸出許可</a>
				</li>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="alert alert-secondary" role="alert">
				<strong>お知らせ</strong></br>書籍を貸し出しました。
			</div>
			<h3>
				貸出許可一覧
			</h3>
			<div class="" >
				<table class="table table-striped  table-hover" style="background-color:#FFFFFF;">
					<thead>
						<tr>
							<th>
								書籍
							</th>
							<th>
								申請者
							</th>
							<th>
								貸出期間
							</th>
							<th>
								許可
							</th>
							<th>
								状態
							</th>
						</tr>
					</thead>
					<tbody>
					@foreach($loan as $key => $var)
						<tr>
							<td>
								{{$key}}
							</td>
							<td>
								{{$var}}
							</td>
							<td>
								01/04/2012
							</td>
							<td>
								Default
							</td>
							<td>
								Default
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
