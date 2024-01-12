<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Mass assignment（一括割り当て）のために、fillable属性を設定します。
    protected $fillable = ['name', 'gender', 'hobby', 'introduction'];

    // バリデーションルール
    public static $rules = [
        'name' => 'required|max:255',
        'gender' => 'required|max:50',
        'hobby' => 'nullable|max:255',
        'introduction' => 'nullable|max:1000'
    ];
}