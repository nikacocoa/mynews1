<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // プロフィール作成画面を表示
    public function add()
    {
        return view('admin.profile.create');
    }

    // プロフィール編集画面を表示
    public function edit()
    {
        return view('admin.profile.edit');
    }
}
