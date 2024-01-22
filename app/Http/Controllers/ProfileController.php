<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // プロフィール情報の取得（この例ではダミーデータを使用）
        $profile = [
            'name' => 'Hinata Harada',
            'email' => 'hinata3030@icloud.com',
            // 他のプロフィール情報
        ];

        // ビューにデータを渡す
        return view('profile.index', ['profile' => $profile]);
    }
}