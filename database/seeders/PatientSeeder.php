<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'farhanjaved@gmail.com')->first();
        
        Patient::create([
            'user_id' => $user->id,
            'date_of_birth' => '1990-01-01',
        ]);
    }
}
