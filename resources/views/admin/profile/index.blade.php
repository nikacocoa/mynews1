@extends('layouts.admin')

@section('title', 'プロフィール一覧')

@section('content')
    <div>
        <h2>プロフィール一覧</h2>
        <table>
            <thead>
                <tr>
                    <th>名前</th>
                    <th>性別</th>
                    <th>趣味</th>
                    <th>自己紹介</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td>{{ $profile->gender }}</td>
                        <td>{{ $profile->hobby }}</td>
                        <td>{{ $profile->introduction }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
