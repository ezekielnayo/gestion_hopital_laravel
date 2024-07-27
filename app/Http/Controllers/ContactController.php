<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Envoyer l'email ou enregistrer le message dans la base de données
    // ...

    return redirect()->route('nous-contacter')->with('success', 'Votre message a été envoyé avec succès!');
}

}
