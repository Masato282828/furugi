<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Shop;
use DateTime;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
        'name' => 'S.O.',
        'overview' => '幅広いジャンルを取り扱い、お値段も適正で学生にもオススメです！',
        'address' => '〒166-0003 東京都杉並区高円寺南４丁目３０−５ きさらぎハイツ',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        'deleted_at' => null,
        ]);
    }
}
