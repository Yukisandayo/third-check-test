@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<h2 class="register-form_title">新規会員登録</h2>
<h4 class="register-form_sub-heading">STEP2 体重データの入力</h4>
<div class="register_form-inner">
    <form method="POST" action="">
    @csrf
        <div class="register-form__group">
            <label class="register-form__label" for="current-weight">現在の体重</label>
            <input class="register-form__input" type="number" name="current-weight" id="current-weight" placeholder="現在の体重を入力">
            <p class="register-form__error-message">
                @error('current-weight')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group">
            <label class="register-form__label" for="goal-weight">目標の体重</label>
            <input class="register-form__input" type="number" name="goal-weight" id="goal-weight" placeholder="目標の体重を入力">
            <p class="register-form__error-message">
                @error('goal-weight')
                {{ $message }}
                @enderror
            </p>
        </div>
        <input type="hidden" name="name" value="{{ old('name') }}">
        <input type="hidden" name="email" value="{{ old('email') }}">
        <input type="hidden" name="password" value="{{ old('password') }}">
        <input class="register-form__btn btn" type="submit" value="次に進む">
    </form>
    <a href="" class="link-login">ログインはこちら</a>
</div>

@endsection('content')