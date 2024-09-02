<?php 

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\MedicalVisit;
use App\Models\User;
use Auth;

class MedicalVisitController extends Controller
{
    public function create()
{
    $patients = User::where('role', 'patient')->get();
    return view('admin.visite', compact('patients'));
}
public function store(Request $request)
{
    $request->validate([
        'patient_id' => 'required|exists:users,id',
        'reason' => 'required|string|max:255',
        'visit_date' => 'required|date|after:today', // Validation de la date
        'observations' => 'nullable|string',
    ]);

    MedicalVisit::create([
        'user_id' => $request->input('patient_id'),
        'reason' => $request->input('reason'),
        'visit_date' => $request->input('visit_date'), // Enregistrement de la date
        'observations' => $request->input('observations'),
    ]);

    return redirect()->route('medical_visits.index')->with('success', 'Visite médicale enregistrée avec succès');
}
// Méthode pour afficher le formulaire de modification
public function edit($id)
{
    $visit = MedicalVisit::findOrFail($id);
    $visit->visit_date = Carbon::parse($visit->visit_date);

    return view('admin.visit_edit', compact('visit'));
}

// Méthode pour mettre à jour les données dans la base
public function update(Request $request, $id)
{
    $visit = MedicalVisit::findOrFail($id);
    $visit->update($request->all());

    return redirect()->route('medical_visits.index')->with('success', 'Visite mise à jour avec succès');
}

// Méthode pour supprimer la visite médicale
public function destroy($id)
{
    $visit = MedicalVisit::findOrFail($id);
    $visit->delete();

    return redirect()->route('medical_visits.index')->with('success', 'Visite supprimée avec succès');
}



// public function store(Request $request)
// {
    // $request->validate([
        // 'patient_id' => 'required|exists:users,id',
        // 'reason' => 'required|string|max:255',
        // 'observations' => 'nullable|string',
    // ]);
// 
    // MedicalVisit::create([
        // 'user_id' => $request->input('patient_id'),
        // 'reason' => $request->input('reason'),
        // 'visit_date' => $request->input('visit_date'),
        // 'observations' => $request->input('observations'),
    // ]);
// 
    // return redirect()->route('medical_visits.index')->with('success', 'Visite médicale enregistrée avec succès');
// }
public function index()
{
    $medicalVisits = MedicalVisit::with('user')->get(); // Récupère les visites médicales avec les informations des patients
    return view('admin.visite_list', compact('medicalVisits'));
}

}
