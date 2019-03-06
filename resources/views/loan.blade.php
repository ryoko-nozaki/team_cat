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
								<div class="row">
								<div class="col-md-8">
									貸出期間
								</div>
								<div class="col-md-2">
									許可
								</div>
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
							<td >
								<form action="/loan" method="post">
									<input type="hidden" id="loan_id" name="loan_id" value="{{$val['id']}}"/>
									<input type="hidden" value="{{$val['book_owner_id']}}" id="book_owner_id" name="book_owner_id">
									<div class="row">
										<div class="col-md-8 input-daterange input-group">
											<input type="date" class="input-sm form-control" id="loan_date" name="loan_date" value="{{$val['loan_date']}}"/>
											<span class="input-group-addon">～</span>
											<input type="date" class="input-sm form-control" id="return_date" name="return_date" value="{{$val['return_date']}}"/>
										</div>
										<div class="col-sm-3 btn-group btn-group-sm" role="group">
											{{ csrf_field() }}
											@if($val['loan_status'] == 0)
												<input class="btn btn-secondary" type="submit" value="OK" id="loan_status" name="loan_status">
												<input class="btn btn-secondary" type="submit" value="NG" id="loan_status" name="loan_status">
											@elseif($val['loan_status'] == 1)
												<input class="btn btn-secondary" type="submit" value="OK" id="loan_status" name="loan_status"  disabled="disabled">
												<input class="btn btn-secondary" type="submit" value="NG" id="loan_status" name="loan_status" disabled="disabled">
											@elseif($val['loan_status'] == 2)
												<input class="btn btn-secondary active" type="submit" value="OK" id="loan_status" name="loan_status">
												<input class="btn btn-secondary" type="submit" value="NG" id="loan_status" name="loan_status">
											@elseif($val['loan_status'] == 3)
												<input class="btn btn-secondary" type="submit" value="OK" id="loan_status" name="loan_status">
												<input class="btn btn-secondary active" type="submit" value="NG" id="loan_status" name="loan_status">
											@endif
										</div>
									</div>
								</form>
							</td>
							<td>
								@if($val['loan_status'] == 0)
									返却済
								@elseif($val['loan_status'] == 1)
									貸出中
								@elseif($val['loan_status'] == 2)
									貸出許可
								@elseif($val['loan_status'] == 3)
									貸出NG
								@endif
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
