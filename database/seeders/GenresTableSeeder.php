<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * foldersTable用テストデータ
     *
     * @return void
     */
    public function run()
    {
        $titles = ['スポーツ', 'ボードゲーム', '飲み会'];

        foreach ($titles as $title) {
            DB::table('genres')->insert([
                'title' => $title,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
