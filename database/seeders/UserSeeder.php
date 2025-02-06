<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'marwan',
                'email'=>'marwan@gmail.com',
                'password'=>Hash::make('marwan123'),
                'role'=>'admin',
            ],
            [
                'name'=>'pembeli',
                'email'=>'pembeli@gmail.com',
                'password'=>Hash::make('pembeli123'),
                'role'=>'user',
            ]
        ]);
    }
}


