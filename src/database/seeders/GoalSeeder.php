<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
 use DateTime;
class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('goals')->insert([
            'goals_name' => '命名の心得',
            'goals_is_deadline' =>  true,
            'goals_deadline' => new DateTime('2025/12/01 09:30:00'), 
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
        DB::table('goals')->insert([
            'goals_name' => '筋トレ',
            'goals_is_deadline' =>  true,
            'goals_deadline' => '2024-11-17 09:30:00+09:00', 
            'goals_reward'  => '冷蔵庫のプリンを食べる',
            'goals_conditions' => '筋トレ20回3セット',
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
