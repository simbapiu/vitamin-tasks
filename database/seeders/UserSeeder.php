<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'rzaldivar',
            'email' => 'rzaldivar@correo.com',
            'password' => Hash::make(env('USER_PASSWORD')),
            'token' => null,
            'token_exp' => null,
        ]);
    }
}
