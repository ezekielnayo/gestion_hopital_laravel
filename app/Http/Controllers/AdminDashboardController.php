<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Employee;
use app\Models\User;
use App\Models\Appointment;

class AdminDashboardController extends Controller
{
    public function addview()
    {
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
        $totalAppointments = Appointment::count();

        return view('admin.dashboard', compact('totalPatients', 'malePatients', 'femalePatients', 'totalAppointments'));
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
