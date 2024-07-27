<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\User;
use App\Models\Patients;
use Illuminate\Support\Facades\Auth; 
use App\Models\MedicalRecord; 

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'role' => 'patient',
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Dossier médical créé avec succès.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'medical_history' => 'nullable|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }

    public function showConsultForm()
    {
        return view('patients.consult_record');
    }

    // Traiter la demande de consultation
    public function consult(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Trouver le patient par nom
        $patient = Patients::where('first_name', $request->first_name)->first();

        if ($patient && Hash::check($request->password, $patient->password)) {
            // Authentifier le patient pour cette session
            Auth::login($patient);

            // Récupérer les dossiers médicaux du patient
            $medicalRecords = MedicalRecord::where('patient_id', $patient->id)->get();

            // Afficher les dossiers médicaux
            return view('patients.medical_records', compact('medicalRecords'));
        }

        return back()->withErrors([
            'name' => 'Nom ou mot de passe incorrect.',
        ]);
    }
}