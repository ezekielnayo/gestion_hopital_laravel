<?php
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
// use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\listepatientController;
use App\Http\Controllers\listerdvController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\consulterController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\ForgotPasswordController;

use App\Http\Controllers\MedicalVisitController;
Auth::routes(['reset' => true]);

Route::get('/medical_visits/{id}/edit', [MedicalVisitController::class, 'edit'])->name('medical_visits.edit');

// Mettre à jour une visite médicale existante (POST)
Route::put('/medical_visits/{id}', [MedicalVisitController::class, 'update'])->name('medical_visits.update');

// Supprimer une visite médicale existante (POST)
Route::delete('/medical_visits/{id}/delete', [MedicalVisitController::class, 'destroy'])->name('medical_visits.destroy');

Route::get('medical_visits/print/{id}', [PDFController::class, 'printe'])->name('medical_visits.print');

Route::get('/users/{id}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit');

Route::put('/users/{id}', [RegisteredUserController::class, 'update'])->name('users.update');

Route::get('/admin/patients/create', [listepatientController::class, 'create'])->name('patients.create');
Route::post('/admin/patients', [listepatientController::class, 'store'])->name('patients.store');


// Route::delete('/patients/{id}', [listepatientController::class, 'destroy'])->name('patients.destroy');
 Route::delete('/patients/{id}', [listepatientController::class, 'destroy'])->name('patients.destroy');

Route::get('/consultation/pdf/{id}', [PDFController::class, 'generatePDF'])->name('consultation.pdf');

Route::get('creerConsultation', function(){
    return view('admin.creerConsultation');
})->name('creerConsultation');

Route::get('/medical-visits', [MedicalVisitController::class, 'index'])->name('medical_visits.index');

Route::get('medical_visits/create', [MedicalVisitController::class, 'create'])->name('medical_visits.create');
Route::post('medical_visits', [MedicalVisitController::class, 'store'])->name('medical_visits.store');


Route::get('/admin/listerdv', [listerdvController::class, 'dash'])->name('admin.listerdv');
Route::put('/admin/listerdv/{id}', [listerdvController::class, 'updateRdvStatus'])->name('appointments.updateStatus');

// Page de découverte
Route::get('/discover', [PageController::class, 'discover'])->name('discover');

// Inscription
Route::get('register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisteredUserController::class, 'register']);

// Connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware("guest");
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Page d'accueil
Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

// Routes pour les patients
// Route::middleware('auth')->group(function() {
    // Route::get('patients', [PatientController::class, 'index'])->name('patients.index');
    // Route::get('patients/create', [PatientController::class, 'create'])->name('patients.create');
    // Route::post('patients', [PatientController::class, 'store'])->name('patients.store');
    // Route::get('patients/{patient}', [PatientController::class, 'show'])->name('patients.show');
    // Route::get('patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    // Route::put('patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
    // Route::delete('patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');
    // Route::get('patients/consult', [PatientController::class, 'showConsultForm'])->name('patients.consult_form');
    // Route::post('patient/consult', [PatientController::class, 'consult'])->name('patient.consult');
// });

// Routes pour les rendez-vous
Route::middleware('auth')->group(function() {

Route::get('/rendezvous/create', [AppointmentController::class, 'creat'])->name('rendezvous.create');
Route::post('/rendezvous/store', [AppointmentController::class, 'stor'])->name('rendezvous.store');

    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});

// Routes pour les employés
Route::middleware('auth')->group(function() {
    Route::get('/employees', [AdminDashboardController::class, 'index'])->name('employees.index');
    // Route::get('/admin/recocrds_medical', [AdminDashboardController::class, 'med'])->name('admin.recocrds_medical');

    Route::get('/employees/{employee}', [AdminDashboardController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [AdminDashboardController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [AdminDashboardController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [AdminDashboardController::class, 'destroy'])->name('employees.destroy');
});

// Tableau de bord de l'admin
Route::middleware('auth')->group(function() {
    
Route::get('/admin/listepatient', [listepatientController::class, 'dash'])->name('admin.listepatient');
Route::get('/admin/listerdv', [listerdvController::class, 'dash'])->name('admin.listerdv');
    
    // Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'addview'])->name('admin.dashboard');
});

// Autres routes
Route::get('/servicees', [ServiceController::class, 'index'])->name('servicees.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/employees', [AdminDashboardController::class, 'store']);
// Route::get('/medical-records', [MedicalRecordController::class, 'index'])->name('medical.records');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

// Routes pour la gestion des dossiers médicaux
Route::middleware('auth')->group(function() {
    Route::get('/medical_records', [MedicalRecordController::class, 'index'])->name('medical_records.index');
    Route::get('/medical_records/create', [MedicalRecordController::class, 'create'])->name('medical_records.create');
    Route::post('/medical_records', [MedicalRecordController::class, 'store'])->name('medical_records.store');
    Route::get('/medical-records/{id}', [MedicalRecordController::class, 'show'])->name('medical_records.show');

    // Route::get('/medical_records/{medicalRecord}', [MedicalRecordController::class, 'show'])->name('medical_records.show');
    Route::get('/medical_records/{medicalRecord}/edit', [MedicalRecordController::class, 'edit'])->name('medical_records.edit');
    Route::put('/medical_records/{medicalRecord}', [MedicalRecordController::class, 'update'])->name('medical_records.update');
    Route::delete('/medical_records/{medicalRecord}', [MedicalRecordController::class, 'destroy'])->name('medical_records.destroy');
});

// Routes pour le tableau de bord des employés
// Route::middleware('auth')->group(function() {
    // Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
    // Route::get('/patients/create', [EmployeeController::class, 'createPatient'])->name('patients.create');
    // Route::post('/patients', [EmployeeController::class, 'storePatient'])->name('patients.store');
    // Route::get('/appointments/create', [EmployeeController::class, 'createAppointment'])->name('appointments.create');
    // Route::post('/appointments', [EmployeeController::class, 'storeAppointment'])->name('appointments.store');
// });


// web.php

Route::put('/admin/rdv/{id}', [listerdvController::class, 'updateRdvStatus'])->name('admin.updateRdvStatus');
route::get('/admin/consulter',[consulterController::class,'cons'])->name('admin.consulter');
//  route::post('/admin/consulter',[consulterController::class,'index']);
Route::get('/admin/recocrds_medical/search', [consulterController::class, 'search'])->name('medical_records.search');



// Route::put('/appointments/{id}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

Route::delete('/consultations/{id}', [ConsultationController::class, 'destroy'])->name('consultations.destroy');


// Route pour afficher toutes les consultations
Route::get('consultations', [ConsultationController::class, 'index'])->name('consultations.index');
// web.php
Route::get('/get-patient-photo/{id}', [DeathController::class, 'getPhotoUrl']);


// Route pour afficher le formulaire de création
Route::get('/consultations/create/{record}', [ConsultationController::class, 'create'])->name('consultations.create');

// Route pour stocker une nouvelle consultation
// Route::post('consultations', [ConsultationController::class, 'store'])->name('consultations.store');

// Route pour afficher une consultation spécifique
// Route::get('consultations/{consultation}', [ConsultationController::class, 'show'])->name('consultations.show');

// Route pour afficher le formulaire d'édition
Route::get('consultations/{consultation}/edit', [ConsultationController::class, 'edit'])->name('consultations.edit');

// Route pour mettre à jour une consultation
Route::put('consultations/{consultation}', [ConsultationController::class, 'update'])->name('consultations.update');

// Route pour supprimer une consultation
// Route::delete('consultations/{consultation}', [ConsultationController::class, 'destroy'])->name('consultations.destroy');

Route::post('consultation/submit', [ConsultationController::class, 'submit'])->name('consultation.submit');


Route::get('patients', [listepatientController::class, 'index'])->name('patients.index');
Route::get('rdv', [listerdvController::class, 'index'])->name('rdv.index');

// Route::get('/consultation/pdf/{id}', [ConsultationController::class, 'generatePDF'])->name('consultation.pdf');
Route::post('/appointments/{appointment}/accept', [AppointmentController::class, 'accept'])->name('appointments.accept');
Route::post('/appointments/{appointment}/complete', [AppointmentController::class, 'complete'])->name('appointments.complete');
Route::post('/appointments/{appointment}/refuse', [AppointmentController::class, 'refuse'])->name('appointments.refuse');








Route::get('/declaration-deces', [DeathController::class, 'create'])->name('deaths.create');
Route::post('/declaration-deces', [DeathController::class, 'store'])->name('deaths.store');

Route::get('/patients/pdf', [PDFController::class, 'generatePD'])->name('patients.pdf');
Route::get('/deaths', [DeathController::class, 'index'])->name('deaths.index');

// routes/web.php
// routes/web.ph
// Route pour afficher le formulaire de demande de réinitialisation du mot de passe
Route::get('password/reset', [LoginController::class, 'showResetForm'])->name('password.request');

// Route pour envoyer l'OTP à l'adresse e-mail saisie par l'utilisateur
Route::post('password/send-otp', [LoginController::class, 'sendOtp'])->name('password.sendOtp');

// Route pour afficher le formulaire de vérification de l'OTP
Route::get('password/verify-otp', [LoginController::class, 'verifyOtpForm'])->name('password.verifyOtp');

// Route pour vérifier l'OTP saisi par l'utilisateur
Route::post('password/verify-otp', [LoginController::class, 'verifyOtp'])->name('password.verifyOtp.post');

// Route pour afficher le formulaire de réinitialisation du mot de passe après vérification de l'OTP
Route::get('password/reset-form', [LoginController::class, 'showResetPasswordForm'])->name('password.resetForm');

// Route pour réinitialiser le mot de passe
Route::post('password/reset-password', [LoginController::class, 'resetPassword'])->name('password.resetPassword');



Route::get('/deaths/{id}', [DeathController::class, 'show'])->name('deaths.show');

Route::get('/deaths/{id}/edit', [DeathController::class, 'edit'])->name('deaths.edit');
Route::delete('/deaths/{id}', [DeathController::class, 'destroy'])->name('deaths.destroy');

// Route pour afficher le formulaire d'édition d'un décès spécifique

// Route pour mettre à jour un décès spécifique
Route::put('/deaths/{id}', [DeathController::class, 'update'])->name('deaths.update');

// Route pour supprimer un décès spécifique

// Route pour imprimer les détails d'un décès spécifique
Route::get('/deaths/{id}/print', [PDFController::class, 'print'])->name('deaths.print');


// routes/web.php
// Route::get('/test-email', function () {
    // $details = [
        // 'title' => 'Mail from Laravel',
        // 'body' => 'This is for testing email using smtp.'
    // ];
    // 
    // \Illuminate\Support\Facades\Mail::to('ezekielnayo7@gmail.com')->send(new \App\Mail\TestMail($details));
    // 
    // return 'Email has been sent';
// });
// 