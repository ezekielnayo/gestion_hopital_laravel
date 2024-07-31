<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;


class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::all();
        return view('admin.medical_records', compact('consultations'));
    }

    public function create()
    {
        $consultations = Consultation::all();

        return view('admin.creerConsultation',compact('consultations'));
    }

    public function submit(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'consultation_date' => 'required|date',
            'weight' => 'nullable|string',
            'temperature' => 'nullable|string',
            'height' => 'nullable|string',
            'blood_pressure' => 'nullable|string',
            'consultation_reason' => 'required|string',
            'symptoms' => 'nullable|string',
            'preliminary_diagnosis' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'chronic_diseases' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'dosage' => 'nullable|string',
            'laboratory_tests' => 'nullable|string',
            'test_results' => 'nullable|string',
            'treatment_plan' => 'nullable|string',
            'follow_up' => 'nullable|string',
            'comments' => 'nullable|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Créer une nouvelle consultation
        $consultation = new Consultation();
        $consultation->consultation_date = $validatedData['consultation_date'];
        $consultation->weight = $validatedData['weight'];
        $consultation->temperature = $validatedData['temperature'];
        $consultation->height = $validatedData['height'];
        $consultation->blood_pressure = $validatedData['blood_pressure'];
        $consultation->consultation_reason = $validatedData['consultation_reason'];
        $consultation->symptoms = $validatedData['symptoms'];
        $consultation->preliminary_diagnosis = $validatedData['preliminary_diagnosis'];
        $consultation->medical_history = $validatedData['medical_history'];
        $consultation->chronic_diseases = $validatedData['chronic_diseases'];
        $consultation->current_medications = $validatedData['current_medications'];
        $consultation->dosage = $validatedData['dosage'];
        $consultation->laboratory_tests = $validatedData['laboratory_tests'];
        $consultation->test_results = $validatedData['test_results'];
        $consultation->treatment_plan = $validatedData['treatment_plan'];
        $consultation->follow_up = $validatedData['follow_up'];
        $consultation->comments = $validatedData['comments'];
        $consultation->first_name = $validatedData['first_name'];
        $consultation->last_name = $validatedData['last_name'];
        $consultation->phone = $validatedData['phone'];

        // Sauvegarder la consultation dans la base de données
        $consultation->save();

        // Rediriger vers le tableau de bord admin avec un message de succès
        return redirect()->route('admin.medical_records')->with('success', 'Consultation enregistrée avec succès');
    }
}