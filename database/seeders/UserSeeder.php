<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' =>  'Masato',
        'email' => 'masato7010@icloud.com',
        'password' => 'masato82',
        'created_at' => new DateTime(),
        'updated_at'=> new DateTime(),
        ]);
    }
}
