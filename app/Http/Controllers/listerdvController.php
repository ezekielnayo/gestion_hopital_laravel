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
    public function updateRdvStatus(Request $request, $id)
{

    $rdv = Appointment::findOrFail($id);
    $rdv->status = $request->input('status');
    $rdv->save();

    return redirect()->route('admin.listerdv')->with('success', 'Le statut du rendez-vous a été mis à jour.');
}
}
