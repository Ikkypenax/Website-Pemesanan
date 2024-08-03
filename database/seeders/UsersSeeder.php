<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = Hash::make("admin2");
        User::create([
            'name'=> 'admin2',
            'email'=> 'admin2@gmail.com',
            'password'=> $p,
            'role'=> 'admin',
        ]);
    }
}
