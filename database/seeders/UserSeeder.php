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
            'name' => 'Dr. Sufyan Ejaz',
            'email' => 'sufyan.ejaz.doc@gmail.com',
            'password' => Hash::make('password'),
            'role' => USER::ROLE_DOCTOR,
        ]);

        User::create([
            'name' => 'Farhan Javed',
            'email' => 'farhanjaved@gmail.com',
            'password' => Hash::make('password'),
            'role' => USER::ROLE_PATIENT,
        ]);
    }
}
