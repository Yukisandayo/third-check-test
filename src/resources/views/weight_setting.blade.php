@extends('layouts.app')

@section('content')
    <h1>目標体重設定</h1>

    <form action="{{ route('goal_setting.update') }}" method="POST">
        @csrf
        <label>目標体重</label>
        <input type="number" name="target_weight" value="{{ $targetWeight->target_weight ?? '' }}" step="0.1" required>

        <button type="submit">更新</button>
    </form>

    <a href="{{ route('admin') }}">戻る</a>
@endsection
