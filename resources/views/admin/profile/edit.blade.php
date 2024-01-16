@extends('layouts.profile')

@section('title', 'プロフィール編集')

@section('content')
    <h1>プロフィール編集</h1>
    
@if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif
    <form action="{{ route('admin.profile.update', ['id' => $profile->id]) }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">氏名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $profile->name) }}" required placeholder="氏名を入力してください">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">性別</label>
            <select class="form-control" id="gender" name="gender">
                <option value="男性" {{ old('gender', $profile->gender) == '男性' ? 'selected' : '' }}>男性</option>
                <option value="女性" {{ old('gender', $profile->gender) == '女性' ? 'selected' : '' }}>女性</option>
            </select>
        </div>

        <div class="form-group">
            <label for="hobby">趣味</label>
            <input type="text" class="form-control" id="hobby" name="hobby" value="{{ old('hobby', $profile->hobby) }}" placeholder="趣味を入力してください">
            @error('hobby')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="introduction">自己紹介</label>
            <textarea class="form-control" id="introduction" name="introduction" rows="5" placeholder="自己紹介を入力してください">{{ old('introduction', $profile->introduction) }}</textarea>
            @error('introduction')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
@endsection