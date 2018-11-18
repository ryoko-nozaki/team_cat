@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Auth::check())
    <p>USER: {{$user->name . ' (' . $user->email . ')'}}</p>
    @else
    <p>※ログインしていません。(<a href="/login">ログイン</a>|
        <a href="/register">登録</a>)</p>
    @endif

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="left">
            Laravel
        </div>
        <div class="right">
            Laravel
        </div>
    </div>
</div>
