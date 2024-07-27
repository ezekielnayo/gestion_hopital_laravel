<?php
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;

// Page de découverte
Route::get('/discover', [PageController::class, 'discover'])->name('discover');

// Inscription
Route::get('register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisteredUserController::class, 'register']);

// Connexion
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware("guest");
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Page d'accueil
Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

// Routes pour les patients
Route::middleware('auth')->group(function() {
    Route::get('patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('patients/{patient}', [PatientController::class, 'show'])->name('patients.show');
    Route::get('patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');
    Route::get('patients/consult', [PatientController::class, 'showConsultForm'])->name('patients.consult_form');
    Route::post('patient/consult', [PatientController::class, 'consult'])->name('patient.consult');
});

// Routes pour les rendez-vous
Route::middleware('auth')->group(function() {
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
    Route::get('/employees/{employee}', [AdminDashboardController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [AdminDashboardController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [AdminDashboardController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [AdminDashboardController::class, 'destroy'])->name('employees.destroy');
});

// Tableau de bord de l'admin
Route::middleware('auth')->group(function() {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
});

// Autres routes
Route::get('/servicees', [ServiceController::class, 'index'])->name('servicees.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/add_doctor_view', [AdminDashboardController::class, 'addview'])->name('add_doctor_view');
Route::post('/add_doctor_view', [AdminDashboardController::class, 'store'])->name("submit");
Route::post('/employees', [AdminDashboardController::class, 'store']);
Route::get('/medical-records', [MedicalRecordController::class, 'index'])->name('medical.records');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

// Routes pour la gestion des dossiers médicaux
Route::middleware('auth')->group(function() {
    Route::get('/patients/{patient}/medical-records/create', [MedicalRecordController::class, 'create'])->name('medical-records.create');
    Route::post('/patients/{patient}/medical-records', [MedicalRecordController::class, 'store'])->name('medical-records.store');
    Route::get('/medical-records/{medicalRecord}/edit', [MedicalRecordController::class, 'edit'])->name('medical-records.edit');
    Route::put('/medical-records/{medicalRecord}', [MedicalRecordController::class, 'update'])->name('medical-records.update');
});

// Routes pour le tableau de bord des employés
Route::middleware('auth')->group(function() {
    Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
    Route::get('/patients/create', [EmployeeController::class, 'createPatient'])->name('patients.create');
    Route::post('/patients', [EmployeeController::class, 'storePatient'])->name('patients.store');
    Route::get('/appointments/create', [EmployeeController::class, 'createAppointment'])->name('appointments.create');
    // Route::post('/appointments', [EmployeeController::class, 'storeAppointment'])->name('appointments.store');
});
