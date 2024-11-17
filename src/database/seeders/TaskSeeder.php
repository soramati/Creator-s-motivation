<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
 use DateTime;
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            'goals_name' => '命名の心得',
            'goals_is_deadline' =>  '2022-07-31 12:53:00+00'::TIMESTAMPTZ, 
            'goals_reward'  => '冷蔵庫のプリンを食べる',
            'goals_conditions' => '一覧画面のバックエンドを実装する',
            'goals_repeat' => '1',
            'goals_point' => '10',
            'goals_is_achieved' => false,
            'goagoals_percentls_point' => '0',
            'goals_id' => '1',
            'wishlists_id' => '1',
            'goals_is_set' => false,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
