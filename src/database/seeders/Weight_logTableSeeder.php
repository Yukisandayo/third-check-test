<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Weight_log;

class Weight_logTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::first();
        Weight_log::factory(35)->create([
            'user_id' => $user->id, // 取得したユーザーのidを設定
        ]);
    }
}
