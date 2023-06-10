<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'アメカジ系',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'きれいめカジュアル',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'ヨーロッパ古着系',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'ストリート系',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'ミリタリー系',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'ワーク系',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'スポーツミックス系',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => '古着ミックス系',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'ヴィンテージ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'その他',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
