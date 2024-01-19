<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
    use HasFactory;

    // このモデルが使用するテーブル名
    protected $table = 'profile_histories';

    // マスアサインメントで代入を許可する属性
    protected $fillable = ['profile_id', 'changed_fields', 'created_at'];

    // Profileモデルとのリレーションシップ（オプション）
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
