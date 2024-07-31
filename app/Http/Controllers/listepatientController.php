<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;


class listepatientController extends Controller
{
    public function dash(){
        $totalPatients = User::where(
            "role",'patient'
        )->count();
        $malePatients = User::where([
            ['gender', '=', 'male'],
            ['role', '=', 'patient']
        ])->count();
        $femalePatients = User::where([
            ['gender', '=', 'female'],
            ['role', '=', 'patient']
        ])->count();
        $patients = User::where(
            "role" , "patient"
            )->get(); // Récupère tous les patients

    // autres méthodes si nécessaires

        return view('admin.listepatient', compact('totalPatients', 'malePatients', 'femalePatients', 'patients'));
    }
}