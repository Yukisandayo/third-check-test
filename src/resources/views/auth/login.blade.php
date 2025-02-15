@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css')}}">
@endsection

@section('content')
<h2 class="login-form_title">ログイン</h2>
<div class="login_form-inner">
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="login-form__group">
            <label class="login-form__label" for="email">メールアドレス</label>
            <input class="login-form__input" type="mail" name="email" id="email" placeholder="メールアドレスを入力">
            <p class="login-form__error-message">
                @error('email')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="login-form__group">
            <label class="login-form__label" for="password">パスワード</label>
            <input class="login-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
            <p class="login-form__error-message">
                @error('password')
                {{ $message }}
                @enderror
            </p>
        </div>
        <input class="login-form__btn btn" type="submit" value="ログイン">
    </form>
    <a href="/auth.register.step1" class="link-login">アカウント作成はこちら</a>
</div>

@endsection('content')