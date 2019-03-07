@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('sidebar')
		<div class="col-md-9">
            <h3>申請中一覧</h3>
            <table class="table table-striped  table-hover" style="background-color:#FFFFFF">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>所持者</th>
                        <th>日付</th>
                        <th>申請結果</th>
                        <th>返却</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($loans as $loan)
                    <tr>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->user->name }}</td>
                        <td>{{ $loan->fetchDate() }}</td>
                        <td>{{ $loan->fetchStatus() }}</td>
                        <td>d</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
		</div>
	</div>
</div>
@endsection
