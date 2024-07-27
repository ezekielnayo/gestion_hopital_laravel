<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::select("*")->where('user_id','=',Auth::user()->id)->get();
        return view('appointments.index', compact('appointments')); 
    }

    public function create()
    {
        // Retourne la vue pour créer un rendez-vous

        return view('appointments.create',);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([       
            'appointment_date' => 'required|date|after:tomorrow',
            'motif' => 'required|string',
        ]);

        Appointment::create([
            // 'employee_id' => $request->employee_id,
            'motif' => $validated['motif'],
            'appointment_date' => $validated['appointment_date'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous pris avec succès.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            // 'employee_id' => 'required|exists:employees,id',
            'appointment_date' => 'required|date',
            // 'notes' => 'nullable|string',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous supprimé avec succès.');
    }
}
