@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('sidebar')
        <div class="col-md-9">
            <h3>貸出許可一覧</h3>
            <table class="table table-striped  table-hover" style="background-color:#FFFFFF;">
                <thead>
                    <tr>
                        <th>書籍</th>
                        <th>申請者</th>
                        <th>貸出希望期間</th>
                        <th>許可</th>
                        <th>返却</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($apply_list as $apply)
                    <tr>
                        <td>{{ $apply->book->title }}</td>
                        <td>{{ $apply->borrower->name }}</td>
                        <td>{{ $apply->fetchDate() }}</td>
                        <td>
                            @if($apply->status === 0)
                                <form action="/loan" method="POST">
                                {{ csrf_field() }}
                                    <div class="col-sm-3 btn-group btn-group-sm" role="group">
                                        <button class="btn btn-primary" type="submit" value="OK" name="loan_status">OK</button>
                                        <button class="btn btn-danger" type="submit" value="NG" name="loan_status">NG</button>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $apply->id }}" />
                                </form>
                            @elseif($apply->status === 1)
                                <div>OK</div>
                            @elseif($apply->status === 2)
                                <div>NG</div>
                            @endif
                        </td>
                        <td>
                            @if($apply->status === 1)
                                @if($apply->return_a === 0)
                                    <div>返却待ち</div>
                                @elseif($apply->return_o === 1)
                                    <div>受け取り完了</div>
                                @elseif($apply->return_o === 0)
                                    <form action="/loan" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-primary" type="submit" value="1" name="return_status">完了</button>
                                        <input type="hidden" name="id" value="{{ $apply->id }}" />
                                    </form>
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
