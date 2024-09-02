<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Notifications\AppointmentStatusNotification;
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
            'appointment_date' => 'required|date',
            'motif' => 'required|string',
        ]);
    
        // Mise à jour des champs dans l'objet Appointment
        $appointment->update([
            'appointment_date' => $request->input('appointment_date'),
            'motif' => $request->input('motif'),
        ]);
    
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }
    










    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous supprimé avec succès.');
    }
    // public function updateStatus(Request $request, $id)
// {
    // $appointment = Appointment::findOrFail($id);
    // $oldStatus = $appointment->status;
    // $appointment->status = $request->input('status');
    // $appointment->save();
    // \Log::info('Rendez-vous mis à jour : ', ['appointment_id' => $id, 'new_status' => $newStatus]);
// 
    // Envoyer la notification à l'utilisateur
    // $user = User::findOrFail($appointment->user_id);
    // $user->notify(new AppointmentStatusNotification($appointment, $appointment->status));
// 
    // return redirect()->back()->with('status', 'Statut du rendez-vous mis à jour et notification envoyée.');
// }
public function accept(Appointment $appointment)
{
    $appointment->status = 'accepted';
    $appointment->save();

    return redirect()->route('appointments.index')->with('success', 'Rendez-vous accepté.');
}

public function refuse(Appointment $appointment)
{
    $appointment->status = 'refused';
    $appointment->save();

    return redirect()->route('appointments.index')->with('success', 'Rendez-vous refusé.');
}


    // Afficher le formulaire de création de rendez-vous
    public function creat()
    {
        // Récupérer tous les utilisateurs ayant le rôle de patient
        $patients = User::where('role', 'patient')->get();

        return view('admin.form', compact('patients'));
    }

    // Enregistrer le rendez-vous
    public function stor(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'patient_id' => 'required|exists:users,id', // Vérifie que l'ID du patient existe
            'appointment_date' => 'required|date|after:tomorrow',
            'motif' => 'nullable|string',
        ]);
    
        // Création du rendez-vous
        Appointment::create([
            'user_id' => $request->patient_id, // Utilise l'ID du patient sélectionné
            'appointment_date' => $request->appointment_date,
            'motif' => $request->motif,
            'status' => 'pending', // Statut par défaut
        ]);
    
        // Rediriger vers la vue de création avec un message de succès
        return redirect()->route('admin.listerdv')->with('success', 'Rendez-vous créé avec succès.');
    }
    




}
