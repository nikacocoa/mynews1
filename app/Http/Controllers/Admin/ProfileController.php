<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest; // ProfileRequestを使用
use App\Models\Profile; // Profileモデルを使用

class ProfileController extends Controller
{
    // プロフィール作成画面を表示
    public function add()
    {
        return view('admin.profile.create');
    }

    // プロフィール編集画面を表示
    public function edit($id) // $idパラメータを追加
    {
        $profile = Profile::find($id); // IDに基づいてプロフィールを検索

        if (!$profile) {
            return abort(404); // プロフィールが見つからない場合は404エラー
        }

        return view('admin.profile.edit', compact('profile'));
    }

    // プロフィールを保存する
    public function store(ProfileRequest $request)
    {
        // バリデーションはProfileRequestによって自動的に処理される

        // バリデーションが通過した後のデータ保存処理
        $profile = new Profile();
        $profile->name = $request->name;
        $profile->gender = $request->gender;
        $profile->hobby = $request->hobby;
        $profile->introduction = $request->introduction;
        $profile->save();

        // 保存後のリダイレクト先など
        return redirect('適切なリダイレクト先');
    }

    // 他のメソッド...
}