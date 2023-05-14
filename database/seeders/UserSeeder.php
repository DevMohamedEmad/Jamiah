<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name'=>'Super-Admin' ,
            'email'=>'super@admin.com',
            'password'=>Hash::make('12345678'),
            'role'=>'Super-Admin'
        ]);
        User::create([
            'name'=>'Admin' ,
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678'),
            'role'=>'Admin'
        ]);
    }
}
