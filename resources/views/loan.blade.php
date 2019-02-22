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
					@foreach($loan as $key => $val)
						<tr>
							<td>
								{{$val['title']}}
							</td>
							<td>
								{{$val['borrower_name']}}
							</td>
							<td>
								{{$val['loan_date']}}～{{$val['return_date']}}
							</td>
							<td>
								<form action="" method="post">
									@if($val['loan_status'] == 0)
										<input type="radio" name="loan_status" value="2" id="ok">OK</input>
										<input type="radio" name="loan_status" value="3" id="ng">NG</input>
									@elseif($val['loan_status'] == 1)
										<input type="radio" name="loan_status" value="2" id="ok" disabled="disabled">OK</input>
										<input type="radio" name="loan_status" value="3" id="ng" disabled="disabled">NG</input>
									@elseif($val['loan_status'] == 2)
										<input type="radio" name="loan_status" value="2" id="ok" checked="checked">OK</input>
										<input type="radio" name="loan_status" value="3" id="ng">NG</input>
									@elseif($val['loan_status'] == 3)
										<input type="radio" name="loan_status" value="2" id="ok">OK</input>
										<input type="radio" name="loan_status" value="3" id="ng" checked="checked">NG</input>
									@endif
								</form>
							</td>
							<td>
								<form action="" method="post">
									@if($val['loan_status'] == 0 || $val['loan_status'] == 3)
										返却済
									@elseif($val['loan_status'] == 1 || $val['loan_status'] == 2)
										貸出中
									@endif
								</form>
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
