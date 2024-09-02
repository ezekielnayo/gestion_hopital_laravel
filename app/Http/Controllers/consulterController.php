<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\MedicalRecord;
use App\Models\Consultation;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
class consulterController extends Controller
{
    // public function cons($id = null)
    // {
        // $consultations = Consultation::where('user_id', $id)->get();
        // $totalConsultations = $consultations->count(); // Calculer le nombre total de consultations
    // 
        // $medicalRecords = MedicalRecord::with('user')->get();
        // dd($medicalRecords->first());

        // dd($medicalRecords); // Pour vérifier les données
    // 
        // return view('admin.consulter', compact('medicalRecords', 'consultations', 'totalConsultations'));
    // }
    public function cons($id = null){
        $consultations = Consultation::where('user_id', $id)->get();
        $medicalRecords = MedicalRecord::with('user')->get();
        $totalConsultations = $consultations->count();
        return view("admin.consulter", compact('medicalRecords','consultations', 'totalConsultations'));
    }



    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('admin.consulter', compact('consultation'));
    }
   
   
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $medicalRecords = MedicalRecord::whereHas('user', function ($query) use ($searchTerm) {
            $query->where('first_name', 'LIKE', "%{$searchTerm}%")
                ->orWhere('last_name', 'LIKE', "%{$searchTerm}%");
        })->get();

        return view('admin.consulter', [
            'medicalRecords' => $medicalRecords,
            'consultations' => [], // Vous pouvez ajuster ceci si nécessaire
            'totalConsultations' => Consultation::count(), // Ajustez selon votre logique
        ]);
    }
// {
    // $searchTerm = $request->input('search');
    // 
    // $medicalRecords = MedicalRecord::whereHas('user', function ($query) use ($searchTerm) {
        // $query->where('first_name', 'LIKE', "%{$searchTerm}%")
            //   ->orWhere('last_name', 'LIKE', "%{$searchTerm}%");
    // })->get();

    // $consultationIds = $medicalRecords->pluck('id');
    // $consultations = Consultation::whereIn('medical_record_id', $consultationIds)->get();

    // return view('admin.consulter', compact('medicalRecords', 'consultations'));
// }
// public function show($id)
// {
    // $consultation = Consultation::findOrFail($id);
    // return view('consultations.show', compact('consultation'));
// }
}
