@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Overpass+Mono" rel="stylesheet">

<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        background-color: #eee;
    }

    #wrapper {
        width: 500px;
        overflow: hidden;
        border: 0px solid #000;
        margin: 50px auto;
        padding: 10px;
    }

    .main-content {
        width: 250px;
        margin: 10px auto;
        background-color: #fff;
        border: 2px solid #e6e6e6;
        padding: 40px 50px;
    }

    .header img {
        height: 50px;
        width: 175px;
        margin: auto;
        position: relative;
        left: 40px;
    }

    .input-1,
    .input-2 {
        width: 100%;
        margin-bottom: 5px;
        padding: 8px 12px;
        border: 1px solid #dbdbdb;
        box-sizing: border-box;
        border-radius: 3px;
    }

    .overlap-text {
        position: relative;
    }

    .overlap-text a {
        position: absolute;
        top: 8px;
        right: 10px;
        color: #003569;
        font-size: 14px;
        text-decoration: none;
        font-family: 'Overpass Mono', monospace;
        letter-spacing: -1px;
    }

    .btn {
        width: 100%;
        background-color: #3897f0;
        border: 1px solid #3897f0;
        padding: 5px 12px;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border-radius: 3px;
    }

    .sub-content {
        width: 250px;
        margin: 10px auto;
        border: 1px solid #e6e6e6;
        padding: 20px 50px;
        background-color: #fff;
    }

    .s-part {
        text-align: center;
        font-family: 'Overpass Mono', monospace;
        word-spacing: -3px;
        letter-spacing: -2px;
        font-weight: normal;
    }

    .s-part a {
        text-decoration: none;
        cursor: pointer;
        color: #3897f0;
        font-family: 'Overpass Mono', monospace;
        word-spacing: -3px;
        letter-spacing: -2px;
        font-weight: normal;
    }

    input:focus {
        background-color: yellow;
    }
</style>

<div id="wrapper">
    <div class="main-content">
        <div class="header">
            <img src="https://i.imgur.com/zqpwkLQ.png" />
        </div>
        <div class="l-part">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" placeholder="Email" class="input-1" value="{{ old('email') }}" required autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="overlap-text">
                    <input type="password" name="password" placeholder="Password" class="input-2" required>
                    <a href="{{ route('password.request') }}">Forgot?</a>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <button type="submit" class="btn">Log in</button>
            </form>
        </div>
    </div>
    <div class="sub-content">
        <div class="s-part">
            Don't have an account?<a href="{{ route('register') }}"> Sign up</a>
        </div>
    </div>
</div>
@endsection
