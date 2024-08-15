<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Slot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = Patient::first();
        $slot = Slot::where('available', true)->first();

        Appointment::create([
            'patient_id' => $patient->id,
            'slot_id' => $slot->id,
            'status' => 'booked',
        ]);

        $slot->update(['available' => false]);
    }
    
}
