<?php

namespace App\Http\Controllers;
use App\Models\Patients;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // if(Auth::id()){

        //     if(Auth::user()->role == 'doctor'){
        //         return view('admin.dashboard');
        //     }
        // }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    return redirect()->intended('/dashboard')->with('success', 'Connexion réussie! Bienvenue, administrateur.');
                case 'patient':
                    return redirect()->intended(route("home"))->with('success', 'Connexion réussie! Bienvenue.');
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors(['email' => 'Rôle utilisateur non valide.']);
            }
        }

        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
