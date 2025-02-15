@extends('layouts.app_admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs.css')}}">
@endsection

@section('content')
<div class="dashboard">
    <div class="target">
        <p>目標体重</p>
        <h2>{{ $targetWeight->target_weight }} kg</h2>
    </div>
    <div class="tillGoal">
        <p>目標まで</p>
        <h2>{{ $latestWeightLog->weight - $targetWeight->target_weight }} kg</h2>
    </div>
    <div class="latest">
        <p>最新体重</p>
        <h2>{{ $latestWeightLog->weight }} kg</h2>
    </div>
</div>
<div class="weight_logs-board">
    <div class="weight_logs-board__header">
        <div class="search-form">
            @csrf
            <form method="GET" action="{{ route('weight.index') }}">
                <input type="date" name="start_date" value="{{ request('start_date') }}">
                <input type="date" name="end_date" value="{{ request('end_date') }}">
                <button type="submit">検索</button>
            </form>
        </div>
        <div class="add-form">
            <a href="#modal" class="open-modal-button">データ追加</a>
        </div>
    </div>
    <div class="weight_logs-table">
        <table>
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weightLogs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->weight }} kg</td>
                    <td>{{ $log->calories }} cal</td>
                    <td>{{ $log->exercise_time }}</td>
                    <td><a href="{{ route('weight.edit', $log->id) }}">✎</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $weightLogs->links() }}
    </div>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <h2>Weight Logを追加</h2>
        <form action="{{ route('weight.store') }}" method="POST">
            @csrf
            <label>日付:</label>
            <input type="date" name="date" required>
            <p class="modal-content__error-message">
                @error('date')
                {{ $message }}
                @enderror
            </p>
            <label>体重:</label>
            <input type="number" step="0.1" name="weight" required>
            <p class="modal-content__error-message">
                @error('weight')
                {{ $message }}
                @enderror
            </p>
            <label>摂取カロリー:</label>
            <input type="number" name="calories" required>
            <p class="modal-content__error-message">
                @error('calories')
                {{ $message }}
                @enderror
            </p>
            <label>運動時間:</label>
            <input type="text" name="exercise_time" required>
            <p class="modal-content__error-message">
                @error('exercise_time')
                {{ $message }}
                @enderror
            </p>
            <label>運動内容:</label>
            <textarea name="exercise_content" placeholder="運動内容を追加"></textarea>
            <p class="modal-content__error-message">
                @error('exercise_content')
                {{ $message }}
                @enderror
            </p>
            <div class="modal-buttons">
                <a href="#" class="close-modal-button">戻る</a>
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection('content')