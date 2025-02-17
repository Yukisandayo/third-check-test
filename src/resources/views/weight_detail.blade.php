@extends('layouts.app')

@section('content')
    <h1>Weight Log</h1>

    <form action="{{ route('weight-log.update', $weightLog->id) }}" method="POST">
        @csrf
        <label>日付</label>
        <input type="date" name="date" value="{{ $weightLog->date }}" required>

        <label>体重</label>
        <input type="number" name="weight" value="{{ $weightLog->weight }}" step="0.1" required>

        <label>摂取カロリー</label>
        <input type="number" name="calories" value="{{ $weightLog->calories }}" required>

        <label>運動時間</label>
        <input type="text" name="exercise_time" value="{{ $weightLog->exercise_time }}" required>

        <label>運動内容</label>
        <textarea name="exercise_content">{{ $weightLog->exercise_content }}</textarea>

        <a href="{{ route('admin') }}">戻る</a>
        <button type="submit">更新</button>
        <button class="delete-button">
            <i class="fas fa-trash"></i>
        </button>
    </form>

@endsection
