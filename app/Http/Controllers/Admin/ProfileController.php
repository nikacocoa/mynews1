<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile; // プロフィールモデルをインポート

class ProfileController extends Controller
{
    // プロフィール作成画面を表示
    public function add()
    {
        return view('admin.profile.create');
    }

    // プロフィール編集画面を表示
    public function edit($id)
    {
    // IDを使用してプロフィールを取得し、編集ビューに渡す
    $profile = Profile::findOrFail($id);
    return view('admin.profile.edit', compact('profile'));
    }

    // プロフィールを保存
    public function create(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'hobby' => 'nullable',
            'introduction' => 'nullable'
        ]);

        // データ保存
        $profile = new Profile($request->all());
        $profile->save();

        return redirect('admin/profile/create')->with('success', 'プロフィールが作成されました');
    }

    // プロフィールを更新
    public function update(Request $request, $id)
    {
        // バリデーション
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'hobby' => 'nullable',
            'introduction' => 'nullable'
        ]);

        // データ更新
        $profile = Profile::find($id);
        $profile->update($request->all());

        return redirect('admin/profile/edit/'.$id)->with('success', 'プロフィールが更新されました');
    }
}