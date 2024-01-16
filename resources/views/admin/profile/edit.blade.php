@extends('layouts.profile')

@section('title', 'プロフィール編集')

@section('content')
    <h1>プロフィール編集</h1>

    <form action="{{ route('admin.profile.update', ['id' => $profile->id]) }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">氏名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $profile->name }}" required>
        </div>

        <div class="form-group">
            <label for="gender">性別</label>
            <select class="form-control" id="gender" name="gender">
                <option value="男性" {{ $profile->gender == '男性' ? 'selected' : '' }}>男性</option>
                <option value="女性" {{ $profile->gender == '女性' ? 'selected' : '' }}>女性</option>
            </select>
        </div>

        <div class="form-group">
            <label for="hobby">趣味</label>
            <input type="text" class="form-control" id="hobby" name="hobby" value="{{ $profile->hobby }}">
        </div>

        <div class="form-group">
            <label for="introduction">自己紹介</label>
            <textarea class="form-control" id="introduction" name="introduction" rows="5">{{ $profile->introduction }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
@endsection
