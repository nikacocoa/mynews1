@extends('layouts.profile')

@section('title', 'プロフィール編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update', ['id' => $profile->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">性別</label>
                        <input type="text" class="form-control" name="gender" value="{{ $profile->gender }}">
                    </div>

                    <div class="form-group">
                        <label for="hobby">趣味</label>
                        <input type="text" class="form-control" name="hobby" value="{{ $profile->hobby }}">
                    </div>

                    <div class="form-group">
                        <label for="introduction">自己紹介欄</label>
                        <textarea class="form-control" name="introduction" rows="5">{{ $profile->introduction }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>
    </div>
@endsection