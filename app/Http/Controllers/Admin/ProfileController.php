<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\ProfileHistory; // ProfileHistoryモデルをインポート
use Illuminate\Support\Facades\Log; // エラーログのためのインポート

class ProfileController extends Controller
{
    // プロフィールの一覧表示
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.index', ['profiles' => $profiles]);
    }

    // プロフィール作成画面を表示
    public function add()
    {
        return view('admin.profile.create');
    }

    // プロフィール編集画面を表示
    public function edit($id)
    {
        $profile = Profile::find($id);
        if (is_null($profile)) {
            return redirect()->route('admin.profile.index')->withErrors('プロフィールが見つかりません。');
        }
        return view('admin.profile.edit', ['profile' => $profile]);
    }

    // プロフィールを保存
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'hobby' => 'nullable',
            'introduction' => 'nullable'
        ]);

        $profile = new Profile($request->only(['name', 'gender', 'hobby', 'introduction']));
        $profile->save();

        return redirect('admin/profile')->with('success', 'プロフィールが作成されました');
    }

    // プロフィールを更新
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        if (is_null($profile)) {
            throw new NotFoundHttpException('プロフィールが見つかりません。');
        }

        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'hobby' => 'nullable',
            'introduction' => 'nullable'
        ]);

        $originalProfile = $profile->getOriginal();
        $profile->update($request->only(['name', 'gender', 'hobby', 'introduction']));
        $updatedProfile = $profile->getAttributes();

        $changes = [];
        foreach ($updatedProfile as $key => $value) {
            if (array_key_exists($key, $originalProfile) && $originalProfile[$key] != $value) {
                $changes[$key] = [
                    'old' => $originalProfile[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            
            try {
                ProfileHistory::create([
                    'profile_id' => $profile->id,
                    'changed_fields' => json_encode($changes),
                    'created_at' => now()
                ]);
            } catch (\Exception $e) {
                Log::error('Failed to save profile history: ' . $e->getMessage());
            }
        }

        return redirect('admin/profile')->with('success', 'プロフィールが更新されました');
    }

}