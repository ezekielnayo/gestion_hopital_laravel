<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patients;
use App\Models\Employee;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function create()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'tel' =>'required|numeric|digits:8',
            'adresse'=>'required|string',
        ]);
    
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['tel'],
            'address' => $validatedData['adresse'],

        ]);
    
        // Auth::login($user);
        return redirect('/login')->with('success', 'Inscription réussie! Veuillez vous connecter.');
    }
    
 
   public function store(Request $request)
   {
       $request->validate([
           'first_name' => ['required', 'string', 'max:255'],
           'last_name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:8', 'confirmed'],
         'role' => ['required', 'string', 'in:admin,doctor,patient'],
       ]);
   
       
   
       // Redirection vers la page d'accueil avec un message de succès
    }
}
