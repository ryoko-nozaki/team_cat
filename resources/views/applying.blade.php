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
                        <td>
                            @if($loan->fetchStatus() === "OK")
                                @if($loan->return_a === 0)
                                    <form action="/applying" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-primary" type="submit" value="1" name="return_status">返却</button>
                                        <input type="hidden" name="id" value="{{ $loan->id }}" />
                                </form>
                                @elseif($loan->return_o === 0)
                                    <div>返却確認中</div>
                                @elseif($loan->return_o === 1)
                                    <div>返却済み</div>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
		</div>
	</div>
</div>
@endsection
