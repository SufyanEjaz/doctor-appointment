<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'sufyan.ejaz.doc@gmail.com')->first();
        
        Doctor::create([
            'user_id' => $user->id,
            'specialization' => 'Cardiology',
        ]);
    }
}
