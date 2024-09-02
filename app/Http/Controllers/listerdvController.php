<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\User;

use Illuminate\Http\Request;

class listerdvController extends Controller
{
    public function dash(){
        $totalAppointments = Appointment::count();
        $appointments = Appointment::with('user')->get();
               return view('admin.listerdv', compact('appointments','totalAppointments'));
       
    }
    // public function indexe()
// {
    // $user = auth()->user();

//    : Rendez-vous de l'utilisateur connecté
    // $userAppointments = Appointment::where('created_by', $user->id)->get();

    // Autres rendez-vous
    // $otherAppointments = Appointment::where('created_by', '!=', $user->id)->get();

    // return view('admin.listerdv', compact('userAppointments', 'otherAppointments'));
// }

    public function updateRdvStatus(Request $request, $id)
{

    $rdv = Appointment::findOrFail($id);
    $newStatus = $request->input('status'); 
    $rdv->status = $newStatus;
    $rdv->save();
    \Log::info('Rendez-vous mis à jour : ', ['appointment_id' => $id, 'new_status' => $newStatus]);


    return redirect()->route('admin.listerdv')->with('success', 'Le statut du rendez-vous a été mis à jour.');
}


public function index(Request $request)
{
    // Rendez-vous de l'utilisateur connecté
    $userAppointments = Appointment::where('created_by', $user->id)->get();
    // Autres rendez-vous
    $otherAppointments = Appointment::where('created_by', '!=', $user->id)->get();

    $searchQuery = $request->input('query');
    if ($searchQuery) {
        // Assurez-vous que la relation 'user' est bien définie dans le modèle Appointment
        $appointments = Appointment::whereHas('user', function ($query) use ($searchQuery) {
            $query->where('first_name', 'like', "%{$searchQuery}%")
                  ->orWhere('last_name', 'like', "%{$searchQuery}%");
        })->get();
    } else {
        $appointments = Appointment::with('user')->get();
    }

    return view('admin.listerdv', compact('appointments','userAppointments', 'otherAppointments'));
}












}