<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
            [
            	'name' => 'caokhanh',
            	'avatar' => '',
            	'email' => 'duckhanhcao1@gmail.com',
            	'password' => Hash::make('caokhanh123'),
            	'role' => 1000
            ],
            [
            	'name' => 'son',
            	'avatar' => '',
            	'email' => 'son@gmail.com',
            	'password' => Hash::make('123456'),
            	'role' => 800
            ],
            [
            	'name' => 'hung',
            	'avatar' => '',
            	'email' => 'hung@gmail.com',
            	'password' => Hash::make('123456'),
            	'role' => 1
            ],
        ];

        DB::table('users')->insert($users);
    }
}
