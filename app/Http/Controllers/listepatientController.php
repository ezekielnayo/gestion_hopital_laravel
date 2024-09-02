<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class listepatientController extends Controller
{
    public function dash()
    {
        $patients = User::paginate(10); // 10 patients par page

        $totalPatients = User::where('role', 'patient')->count();
        $malePatients = User::where([
            ['gender', '=', 'male'],
            ['role', '=', 'patient']
        ])->count();
        $femalePatients = User::where([
            ['gender', '=', 'female'],
            ['role', '=', 'patient']
        ])->count();
        $patients = User::where('role', 'patient')->get(); // Récupère tous les patients

        return view('admin.listepatient', compact('totalPatients', 'malePatients', 'femalePatients', 'patients'));
    }

    public function index(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $patients = User::where('first_name', 'like', "%{$query}%")
                ->orWhere('last_name', 'like', "%{$query}%")
                ->get();
        } else {
            $patients = User::where('role', 'patient')->get();
        }

        $totalPatients = User::where('role', 'patient')->count();
        $malePatients = User::where([
            ['gender', '=', 'male'],
            ['role', '=', 'patient']
        ])->count();
        $femalePatients = User::where([
            ['gender', '=', 'female'],
            ['role', '=', 'patient']
        ])->count();
        $patients = User::paginate(10); // 10 patients par page

        return view('admin.listepatient', compact('totalPatients', 'malePatients', 'femalePatients', 'patients'));
    }
    public function destroy($id)
    {
        $patient = User::find($id);
        
        if (!$patient) {
            return redirect()->route('admin.listepatient')->with('error', 'Patient non trouvé.');
        }
        $patient->appointments()->delete();
    
        $patient->delete();
        
        return redirect()->route('admin.listepatient')->with('success', 'Patient supprimé avec succès.');
    }
    public function create()
    {
        return view('admin.createp');
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'tel' => 'required|numeric|digits:8',
        'adresse' => 'required|string',
        'gender' => ['required', 'string', 'in:male,female,other'],
    ]);

    // Création de l'utilisateur
    $user = User::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'phone' => $validatedData['tel'],
        'address' => $validatedData['adresse'],
        'gender' => $validatedData['gender'],
    ]);

    $user->role = 'patient'; 
    $user->save();

    return redirect()->route('admin.listepatient')->with('success', 'Patient ajouté avec succès.');
}

}

