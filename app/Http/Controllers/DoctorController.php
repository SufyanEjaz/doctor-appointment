<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Show Doctor Listing
    public function index(){
        $doctors = Doctor::with('user')->get();
        return view('doctors.index', compact('doctors'));
    }

    // Show Doctor Detail Page
    public function show(int $id){
        $doctor = Doctor::with(['user', 'slots' => function($query) {
            $query->where('available', true);
        }])->findOrFail($id);
        return view('doctors.show', compact('doctor'));
    }
}
