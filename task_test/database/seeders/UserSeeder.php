<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [
                'name' => 'aaa',
                'email' => 'test@test.com',
                'password' => Hash::make('password123'),
                'created_at' => now()
            ],
            [
                'name' => 'bbb',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'),
                'created_at' => now()
            ]
        ]);
    }
}