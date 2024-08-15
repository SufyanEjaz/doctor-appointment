<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctor = Doctor::first();

        $slots = [
            ['date' => Carbon::today()->toDateString(), 'time' => '09:00', 'duration' => 30, 'available' => true],
            ['date' => Carbon::today()->toDateString(), 'time' => '09:30', 'duration' => 30, 'available' => true],
            ['date' => Carbon::today()->toDateString(), 'time' => '10:00', 'duration' => 30, 'available' => true],
            ['date' => Carbon::tomorrow()->toDateString(), 'time' => '09:00', 'duration' => 30, 'available' => true],
            ['date' => Carbon::tomorrow()->toDateString(), 'time' => '09:30', 'duration' => 30, 'available' => true],
        ];

        foreach ($slots as $slot) {
            Slot::create([
                'doctor_id' => $doctor->id,
                'date' => $slot['date'],
                'time' => $slot['time'],
                'duration' => $slot['duration'],
                'available' => $slot['available'],
            ]);
        }
    }
}
