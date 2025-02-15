@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<h2 class="register-form_title">新規会員登録</h2>
<h4 class="register-form_sub-heading">STEP2 体重データの入力</h4>
<div class="register_form-inner">
    <form method="POST" action="{{ route('register.step2.store') }}">
    @csrf
        <div class="register-form__group">
            <label class="register-form__label" for="weight">現在の体重</label>
            <input class="register-form__input" type="number" name="weight" id="weight" placeholder="現在の体重を入力">
            <p class="register-form__error-message">
                @error('weight')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group">
            <label class="register-form__label" for="target-weight">目標の体重</label>
            <input class="register-form__input" type="number" name="target-weight" id="target-weight" placeholder="目標の体重を入力">
            <p class="register-form__error-message">
                @error('target-weight')
                {{ $message }}
                @enderror
            </p>
        </div>
        <input class="register-form__btn btn" type="submit" value="アカウント作成">
    </form>
</div>

@endsection('content')