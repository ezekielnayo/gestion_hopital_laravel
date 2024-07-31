<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;
class MedicalRecordController extends Controller
{
    public function index()
    {
        $medicalRecords = MedicalRecord::where('user_id', Auth::id())->get();
        return view('medical_records.index', compact('medicalRecords'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $existingRecord = MedicalRecord::where('user_id', Auth::id())->first();

        if ($existingRecord) {
            return redirect()->route('medical_records.show', $existingRecord->id)
                             ->with('error', 'Vous avez déjà un dossier médical.');
        }

        return view('medical_records.create');
    }

    // Enregistrer un nouveau dossier médical
    public function store(Request $request)
    {
        $existingRecord = MedicalRecord::where('user_id', Auth::id())->first();

        if ($existingRecord) {
            return redirect()->route('medical_records.show', $existingRecord->id)
                             ->with('error', 'Vous avez déjà un dossier médical.');
        }

        $request->validate([
            'date_of_birth' => 'required|date|before:today',
            'blood_group' => 'required|string',
            'medical_history' => 'required|boolean',
            'current_medications' => 'required|boolean',
            'allergies' => 'required|boolean',
            'date_consult' => 'required|date',
        ]);

        MedicalRecord::create(array_merge($request->all(), ['user_id' => Auth::id()]));
        return redirect()->route('medical_records.index')->with('success', 'Dossier médical créé avec succès.');
    }

    // Afficher un dossier médical spécifique
    public function show($id)
{
    // Récupérer le dossier médical
    $medicalRecord = MedicalRecord::findOrFail($id);

    // Récupérer les informations de l'utilisateur associé
    $user = $medicalRecord->user;

    return view('medical_records.show', compact('medicalRecord', 'user'));
}

    // Afficher le formulaire d'édition d'un dossier médical spécifique
    public function edit(MedicalRecord $medicalRecord)
    {
        return view('medical_records.edit', compact('medicalRecord'));
    }

    // Mettre à jour un dossier médical spécifique
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'date_of_birth' => 'required|date|before:today',
            'blood_group' => 'required|string',
            'medical_history' => 'required|boolean',
            'current_medications' => 'required|boolean',
            'allergies' => 'required|boolean',
            'date_consult' => 'required|date',
        ]);

        $medicalRecord->update($request->all());
        return redirect()->route('medical_records.index')->with('success', 'Dossier médical mis à jour avec succès.');
    }

    // Supprimer un dossier médical spécifique
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();
        return redirect()->route('medical_records.index')->with('success', 'Dossier médical supprimé avec succès.');
    }

}