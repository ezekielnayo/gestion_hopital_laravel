<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Employee;
use app\Models\User;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\MedicalRecord;
use App\Models\Death;
use App\Models\MedicalVisit;





class AdminDashboardController extends Controller
{
    public function addview()
    {
        $totalDeaths = Death::count();
        $totalMedicalRecords = MedicalRecord::count();
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
        $medicalRecordsCompleted = MedicalRecord::where('completed', true)->count();

        $rejectedAppointments = Appointment::where('status', 'refused')->count();
        \Log::info('Rejected Appointments Count: ' . $rejectedAppointments);

        $acceptedAppointments = Appointment::where('status', 'accepted')->count();
        $totalConsultations = Consultation::count();
        $totalAppointments = Appointment::count();
        $totalcons = Consultation::count();
        $ongoingConsultations = Consultation::where('status', 'en_cours')->count();
        $completedConsultations = Consultation::where('status', 'complete')->count();
        $totalMedicalVisits = MedicalVisit::count();
        $medicalRecordsCreated = MedicalRecord::whereNotNull('created_at')->count();
        $pendingAppointments = Appointment::where('status', 'pending')->count();


        return view('admin.dashboard', [
            'medicalRecordsCreated' => $medicalRecordsCreated,
            'medicalRecordsCompleted' => $medicalRecordsCompleted,
            'totalMedicalRecords' => $totalMedicalRecords,
            'rejectedAppointments' => $rejectedAppointments,
             'medicalRecordsCompleted' => $medicalRecordsCompleted,
            'totalPatients' => $totalPatients,
            'malePatients' => $malePatients,
            'femalePatients' => $femalePatients,
            'totalAppointments' => $totalAppointments,
            'totalConsultations' => $totalConsultations,
            'ongoingConsultations' => $ongoingConsultations,
            'completedConsultations' => $completedConsultations,
            'acceptedAppointments' => $acceptedAppointments,
            'totalDeaths' => $totalDeaths,
            'pendingAppointments' =>  $pendingAppointments,
            'totalMedicalVisits' =>   $totalMedicalVisits,

        ]);


       
    }
    // public function med(){
        // return view('admin.medical_records');
    // }
    public function index()
    {
        // Récupérer tous les dossiers médicaux avec les informations des utilisateurs
        $medicalRecords = MedicalRecord::with('user')->get();
        return view('admin.consulter', compact('medicalRecords'));
    }


    
































































// 
    // public function index()
    // {
        // $employees = Employee::all();
        // return view('employees.index', compact('employees'));
    // }
// 
    // public function show(Employee $employee)
    // {
        // return view('employees.show', compact('employee'));
    // }
// 
    // public function edit(Employee $employee)
    // {
        // return view('employees.edit', compact('employee'));
    // }
// 
    // public function update(Request $request, Employee $employee)
    // {
        // $request->validate([
            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            // 'phone' => 'required|string|max:15',
    // 
            // 'speciality' => 'required|string|max:255',
        // ]);
// 
        // $employee->update([
            // 'first_name' => $request->first_name,
            // 'last_name' => $request->last_name,
            // 'email' => $request->email,
            // 'phone' => $request->phone,
            // 'speciality' => $request->speciality,
            // 
        // ]);
// 
        // return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès.');
    // }
// 
    // public function destroy(Employee $employee)
    // {
        // $employee->delete();
        // return redirect()->route('employees.index')->with('success', 'Employé supprimé avec succès.');
    // }
}
