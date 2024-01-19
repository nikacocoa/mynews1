@extends('layouts.admin')

@section('title', 'プロフィール編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>プロフィール編集</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.profile.update', ['id' => $profile->id]) }}" method="post">
                @csrf

                <div class="form-group row">
                    <label class="col-md-2" for="name">氏名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $profile->name) }}" required placeholder="氏名を入力してください">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2" for="gender">性別</label>
                    <div class="col-md-10">
                        <select class="form-control" id="gender" name="gender">
                            <option value="男性" {{ old('gender', $profile->gender) == '男性' ? 'selected' : '' }}>男性</option>
                            <option value="女性" {{ old('gender', $profile->gender) == '女性' ? 'selected' : '' }}>女性</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2" for="hobby">趣味</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="hobby" name="hobby" value="{{ old('hobby', $profile->hobby) }}" placeholder="趣味を入力してください">
                        @error('hobby')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2" for="introduction">自己紹介</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="introduction" name="introduction" rows="5" placeholder="自己紹介を入力してください">{{ old('introduction', $profile->introduction) }}</textarea>
                        @error('introduction')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>
            </form>

            <div class="row mt-5">
                <div class="col-md-4 mx-auto">
                    <h2>編集履歴</h2>
                    <ul class="list-group">
                        @if ($profile->histories != NULL)
                            @foreach ($profile->histories as $history)
                                <li class="list-group-item">{{ $history->edited_at }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection