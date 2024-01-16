<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_history', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_history', function (Blueprint $table) {
            //
        });
    }
    public function update(Request $request)
    {
    // プロフィールを更新する
    $profile->name = $request->input('name');
    $profile->save();

    // 履歴を取得する
    $history = ProfileHistory::where('profile_id', $profile->id)->first();

    // 履歴を表示する
    echo $history->changed_fields;

    $profile->saveHistory();
    // ...
    }
    public function saveHistory()
    {
    // 履歴テーブルのインスタンスを作成する
    $history = new ProfileHistory();
    // プロフィールIDを設定
    $history->profile_id = $this->id;
    // 更新日時を設定
    $history->updated_at = Carbon::now();
    // 更新されたフィールドを設定
    $history->changed_fields = $this->getChangedFields();
    // 履歴を保存する
    $history->save();
    }
};
