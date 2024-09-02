<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patients;
use App\Models\Employee;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
    // public function create()
    // {
        // return view('register');
    // }
    public function register(Request $request)

    {


    ini_set('max_execution_time', 300);
    
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'tel' => 'required|numeric|digits:8',
        'adresse' => 'required|string',
        'gender' => ['required', 'string', 'in:male,female,other'],
        'passport_photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
    ],
         [
            'passport_photo.image' => 'La photo de passeport doit être une image.',
            'passport_photo.mimes' => 'La photo de passeport doit être au format jpg, png, ou jpeg.',
            'passport_photo.max' => 'La photo de passeport ne doit pas dépasser 2 Mo.',
        ]
    );

    // if ($request->hasFile('passport_photo')) {
        // $file = $request->file('passport_photo');
        // dd($file->getClientOriginalExtension(), $file->getSize(), $file->getMimeType());
    // }

    // Gestion de la photo de passeport
    $photoPath = null;
    if ($request->hasFile('passport_photo')) {
        $photoPath = $request->file('passport_photo')->store('passport_photos', 'public');
    }


    // Création de l'utilisateur
    $user = User::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'phone' => $validatedData['tel'],
        'address' => $validatedData['adresse'],
        'gender' => $validatedData['gender'],
        'passport_photo' => $photoPath,
    ]);

    // Authentification de l'utilisateur
    // Auth::login($user);
     // Test de redirection
     \Log::info('Utilisateur inscrit et redirection effectuée.');

     // Redirection
    //  return redirect()->route('login')->with('success', 'Inscription réussie! Veuillez vous connecter.');
 
     return redirect('/login')->with('success', 'Inscription réussie! Veuillez vous connecter.');
    dd('Redirection testée avec succès');

}
public function edit($id)
{
    $user = User::findOrFail($id);
    return view('edit', compact('user'));
}

// Mettre à jour les informations de l'utilisateur
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'gender' => 'required|string',
        'password' => 'nullable|string|min:8|confirmed',
        'passport_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Mise à jour des informations utilisateur
    $user->first_name = $validatedData['first_name'];
    $user->last_name = $validatedData['last_name'];
    $user->phone = $validatedData['phone'];
    $user->address = $validatedData['address'];
    $user->email = $validatedData['email'];
    $user->gender = $validatedData['gender'];

    // Mise à jour du mot de passe s'il est renseigné
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Gestion de la photo de passeport
    if ($request->hasFile('passport_photo')) {
        $photoPath = $request->file('passport_photo')->store('passport_photos', 'public');
        $user->passport_photo = $photoPath;
    }

    // Sauvegarde des modifications
    $user->save();

    return redirect()->route('home', ['id' => $user->id])->with('success', 'Profil mis à jour avec succès.');
}

}