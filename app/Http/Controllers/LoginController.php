<?php

namespace App\Http\Controllers;
use App\Models\Patients;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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
                    return redirect()->route('admin.dashboard')->with('success', 'Connexion réussie! Bienvenue, administrateur.');
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
    // public function request()
    // {
    // set_time_limit(120); 

        // return view('passwords.email');
    // }
    // public function email(Request $request)
    // {
        // $request->validate(['email' => 'required|email']);
        // $status = Password::sendResetLink($request->only('email'));
        // return $status === Password::RESET_LINK_SENT
                    // ? back()->with(['status' => __($status)])
                    // : back()->withErrors(['email' => __($status)]);
    // }
    // public function reset(Request $request)
    // {
        // return view('passwords.reset', ['token' => $request->route('token')]);
    // }
    // public function update(Request $request)
    // {
        // $request->validate([
            // 'email' => 'required|email',
            // 'password' => 'required|string|min:8|confirmed',
            // 'token' => 'required'
        // ]);
        // $status = Password::reset(
            // $request->only('email', 'password', 'password_confirmation', 'token'),
            // function ($user, $password) {
                // $user->forceFill([
                    // 'password' => Hash::make($password)
                // ])->save();
            // }
        // );
        // return $status === Password::PASSWORD_RESET
                    // ? redirect()->route('login')->with('status', __($status))
                    // : back()->withErrors(['email' => [__($status)]]);
    // }
    public function showResetForm()
    {
        return view('passwords.email');
    }
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        // Générer un OTP aléatoire
        $otp = rand(100000, 999999);
        // Stocker l'OTP et l'email dans la session (ou en base de données si vous préférez)
        $request->session()->put('otp', $otp);
        $request->session()->put('email', $request->email);
        // Envoyer l'OTP par e-mail
        Mail::raw("Votre code de réinitialisation de mot de passe est : $otp", function ($message) use ($request) {
            $message->from('no-reply@mailtrap.com', 'Votre Application');
            $message->to($request->email);
            $message->subject('Code de réinitialisation de mot de passe');
        });
        return redirect()->route('password.verifyOtp');
    }
    public function verifyOtpForm()
    {
        return view('passwords.verify-otp');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);
        if ($request->otp == $request->session()->get('otp')) {
            return redirect()->route('password.resetForm');
        }
        return back()->withErrors(['otp' => 'Le code OTP est incorrect.']);
    }
    public function showResetPasswordForm()
    {
        return view('passwords.reset');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed',
        ]);
        $user = User::where('email', $request->session()->get('email'))->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé avec succès.');
    }
}
