<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\User;
use App\Models\MedicalVisit;

use App\Models\Death;



use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;



class PDFController extends Controller
{
    

public function generatePDF($id)
{

    
    $options = new \Dompdf\Options();
    $options->set('isHtml5ParserEnabled', true);
    
    $options->set('isRemoteEnabled', true);
    $pdf = new \Dompdf\Dompdf($options);
    
    set_time_limit(120); 
    // Récupérer une seule consultation par son ID
    $consultation = Consultation::findOrFail($id);
    $currentDate = Carbon::now()->format('d/m/Y H:i');
    
    // Passer le modèle unique à la vue
    $pdf = Pdf::loadView('pdf.consultation', ['consultation' => $consultation, 'currentDate' => $currentDate]);
    return $pdf->download('consultation_' . $consultation->id . '.pdf');

}

public function generatePD(){
    set_time_limit(120); 

    $currentDate = Carbon::now()->format('d/m/Y H:i');
    $patients = User::where('role', 'patient')->get();
    
        $pdf = PDF::loadView('pdf.index',  ['patients' => $patients, 'currentDate' => $currentDate]);
        return $pdf->download('liste_patients.pdf');
}
public function printe($id)
{
    set_time_limit(120); 

    $currentDate = Carbon::now()->format('d/m/Y H:i');

    $visit = MedicalVisit::findOrFail($id);
    $pdf = PDF::loadView('pdf.printe',  ['visit' => $visit, 'currentDate' => $currentDate]);
    return $pdf->stream('visite_medicale_' . $id . '.pdf');
}


public function print($id)
{
    set_time_limit(120); 

    $death = Death::findOrFail($id);
    // Logique d'impression des détails du décès (génération PDF, etc.)
    $pdf = PDF::loadView('pdf.print', compact('death'));
    return $pdf->download('liste_deces.pdf');
}
}
