@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<h2 class="register-form_title">新規会員登録</h2>
<h4 class="register-form_sub-heading">STEP1 アカウント情報の登録</h4>
<div class="register_form-inner">
    <form method="POST" action="{{ route('register.step1') }}">
    @csrf
        <div class="register-form__group">
            <label class="register-form__label" for="name">お名前</label>
            <input class="register-form__input" type="text" name="name" id="name" placeholder="名前を入力">
            <p class="register-form__error-message">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group">
            <label class="register-form__label" for="email">メールアドレス</label>
            <input class="register-form__input" type="mail" name="email" id="email" placeholder="メールアドレスを入力">
            <p class="register-form__error-message">
                @error('email')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group">
            <label class="register-form__label" for="password">パスワード</label>
            <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
            <p class="register-form__error-message">
                @error('password')
                {{ $message }}
                @enderror
            </p>
        </div>
        <input class="register-form__btn btn" type="submit" value="次に進む">
    </form>
    <a href="/auth.login" class="link-login">ログインはこちら</a>
</div>

@endsection('content')