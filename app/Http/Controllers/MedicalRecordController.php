<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth; 
class MedicalRecordController extends Controller
{
    public function index()
    {
        $patientId = Auth::id(); 
        
        // Récupère le dossier médical du patient connecté
        $medicalRecord = MedicalRecord::where('patient_id', $patientId)->first();
        return view('medical_records.index',['medicalRecord'=>$medicalRecord]); // Assurez-vous que cette vue existe
    }
    public function store(Request $request, User $patient)
    {
        $request->validate([
            'date_of_birth' => 'required|date',
            'medical_history' => 'required|string',
            'current_medications' => 'required|string',
        ]);

        MedicalRecord::create([
            'patient_id' => $patient->id,
            'date_of_birth' => $request->date_of_birth,
            'medical_history' => $request->medical_history,
            'current_medications' => $request->current_medications,
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Dossier médical créé avec succès.');
    }

    public function edit(MedicalRecord $medicalRecord)
    {
        return view('medical-records.edit', compact('medicalRecord'));
    }

    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'date_of_birth' => 'required|date',
            'medical_history' => 'required|string',
            'current_medications' => 'required|string',
        ]);

        $medicalRecord->update([
            'date_of_birth' => $request->date_of_birth,
            'medical_history' => $request->medical_history,
            'current_medications' => $request->current_medications,
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Dossier médical mis à jour avec succès.');
    }
}
