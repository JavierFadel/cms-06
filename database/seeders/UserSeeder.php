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
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'admin1',
        	'role' => 'admin',
        	'password' => Hash::make('admin1'),
        ]);

        DB::table('users')->insert([
        	'name' => 'admin2',
        	'role' => 'admin',
        	'password' => Hash::make('admin2'),
        ]);

        DB::table('users')->insert([
        	'name' => 'user1',
        	'role' => 'user',
        	'password' => Hash::make('user1'),
        ]);
    }
}
