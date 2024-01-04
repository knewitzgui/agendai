<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('users')->insert([
            [
                'id'   => 1,
                'name' => 'Sycon',
                'email' => 'guilherme@sycon.tech',
                'password' => Hash::make('@Sycon82465'),
                'role_id' => 1
            ]
        ]);
    }
}
