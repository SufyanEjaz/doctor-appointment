<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Slot;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(AppointmentRequest $request)
    {
        $slot = Slot::findOrFail($request->slot_id);

        if (!$slot->available) {
            return redirect()->back()->with('error', 'Slot not available');
        }

        $appointment = Appointment::create([
            'patient_id' => $request->patient_id,
            'slot_id' => $request->slot_id,
            'status' => Appointment::STATUS_BOOKED,
        ]);

        $slot->update(['available' => false]);
        return redirect()->back()->with('success', 'Appointment booked successfully');
    }

    public function findEarliestAppointment(int $doctor_id)
    {
        // find the earliest available slot for specific doctor
        $doctor = Doctor::with([
            'slots' => function($query) {
                $query->where('available', true)
                      ->select('id', 'doctor_id', 'date', 'time', 'duration', 'available')
                      ->orderBy('date', 'asc')
                      ->orderBy('time', 'asc');
            },
            'user:id,name'
        ])->select('id', 'specialization', 'user_id')->findOrFail($doctor_id);

        // check if the slots exist or not
        if ($doctor->slots->isEmpty()) {
            return redirect()->back()->with('error', 'No available slots');
        }

        $doctorData = [
            'name' => $doctor->user->name,
            'specialization' => $doctor->specialization,
            'slots' => $doctor->slots,
        ];

        return view('doctors.available-slots', compact('doctorData'));
    }
}
