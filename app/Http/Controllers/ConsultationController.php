<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\User;

// use PDF;


class ConsultationController extends Controller
{
    // public function generatePDF($id)
    // {
        // $consultation = Consultation::findOrFail($id);
        // 
        // $pdf = PDF::loadView('pdf.consultation', compact('consultation'));
        // return $pdf->download('consultation_'.$consultation->id.'.pdf');
    // }
    public function destroy($id)
    {
        // Récupérer la consultation par ID et la supprimer
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        // Rediriger avec un message de succès
        return redirect()->route('consultations.index')->with('success', 'Consultation supprimée avec succès.');
    }
    public function index()

    {
        // $consultations = Consultation::paginate(10);
        $consultations = Consultation::all();
        return view('admin.medical_records', compact('consultations'));
    }

    public function create($record)
    {
        // Vous pouvez récupérer le patient ou autre information en utilisant l'ID fourni dans $record
        $recordData = User::findOrFail($record);

        // Passer les données nécessaires à la vue
        return view('admin.creerConsultation', compact('recordData'));
    }

    public function submit(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
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
            'phone' => 'required|string|max:20',
            'status' => 'required|in:en_cours,complete',
            

        ]);

        // Récupérer l'utilisateur à partir de l'ID fourni
        $user = User::findOrFail($validatedData['user_id']);

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
        $consultation->first_name = $user->first_name;
        $consultation->last_name = $user->last_name;
        $consultation->passport_photo = $user->passport_photo;

        $consultation->phone = $validatedData['phone'];
        $consultation->user_id = $validatedData['user_id']; 
        $consultation->status =  $validatedData['status']; // Marque la consultation comme terminée
        $consultation->save();// Utilisez la valeur validée

        // Sauvegarder la consultation dans la base de données
        $consultation->save();

        // Rediriger vers le tableau de bord admin avec un message de succès
        return redirect()->route('consultations.index')->with('success', 'Consultation enregistrée avec succès');
    }
    public function edit($id)
    {
        // Récupérer la consultation par ID
        $consultation = Consultation::findOrFail($id);

        // Afficher la vue de modification avec les données de la consultation
        return view('admin.edit', compact('consultation'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'consultation_date' => 'required|date',
            'weight' => 'required|numeric',
            'temperature' => 'required|numeric',
            'height' => 'required|numeric',
            'blood_pressure' => 'required|string',
            'consultation_reason' => 'required|string',
            'symptoms' => 'required|string',
            'preliminary_diagnosis' => 'required|string',
            'follow_up' => 'required|string',
            'comments' => 'nullable|string',
        ]);

        // Récupérer la consultation par ID
        $consultation = Consultation::findOrFail($id);

        // Mettre à jour les données de la consultation
        $consultation->update($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès.');
}
}