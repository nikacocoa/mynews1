@extends('layouts.admin')

@section('title', 'プロフィール作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール作成</h2>
                <form action="{{ url('/admin/profile/create') }}" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">性別</label>
                        <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                    </div>

                    <div class="form-group">
                        <label for="hobby">趣味</label>
                        <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                    </div>

                    <div class="form-group">
                        <label for="introduction">自己紹介欄</label>
                        <textarea class="form-control" name="introduction" rows="5">{{ old('introduction') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">送信</button>
                </form>
            </div>
        </div>
    </div>
@endsection