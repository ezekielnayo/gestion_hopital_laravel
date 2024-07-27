<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Patients;

use App\Models\User;

class EmployeeController extends Controller
{
    
        /**
         * Display a listing of the employees.
         *
         * @return \Illuminate\Http\Response
         * 
         * 
         *     
         */
         
          public function index()
    {
        // Vous pouvez récupérer les patients et les rendez-vous ici
        $patients = User::where('role', 'patient')->get();
        $appointments = Appointment::where('employee_id', auth()->id())->get();

        return view('employee.dashboard', [
            'patients' => $patients,
            'appointments' => $appointments,
        ]);


    }


    public function createPatient()
    {
        return view('patients.create');
    }

    public function storePatient(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'patient',
            'password' => bcrypt($request->password),// Assurez-vous de changer cela plus tard
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Patient créé avec succès.');
    }

    public function createAppointment()
    {
        return view('appointments.create');
    }

    public function storeAppointment(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'patient_id' => 'required|exists:users,id',
        ]);

        Appointment::create([
            'date' => $request->date,
            'patient_id' => $request->patient_id,
            'employee_id' => auth()->id(),
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Rendez-vous créé avec succès.');
    }









































































     
    //     public function index()
    // {
    //     $employees = Employee::all();
    //     return view('employees.index', compact('employees'));
    // }

    // /**
    //  * Show the form for creating a new employee.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('employees.create');
    // }

    // /**
    //  * Store a newly created employee in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:employees,email',
    //         'phone' => 'required|string|max:15',
    //         'speciality' => 'required|string|max:255',
    //     ]);

    //     Employee::create([
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'speciality' => $request->speciality,
    //     ]);

    //     return redirect()->route('employees.index');
    // }

    // /**
    //  * Show the form for editing the specified employee.
    //  *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Employee $employee)
    // {
    //     return view('employees.edit', compact('employee'));
    // }

    // /**
    //  * Update the specified employee in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Employee $employee)
    // {
    //     $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:employees,email,' . $employee->id,
    //         'phone' => 'required|string|max:15',
    //         'speciality' => 'required|string|max:255',
    //     ]);

    //     $employee->update([
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'speciality' => $request->speciality,
    //     ]);

    //     return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès');
    // }

    // /**
    //  * Display the specified employee.
    //  *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Employee $employee)
    // {
    //     return view('employees.show', compact('employee'));
    // }

    // /**
    //  * Remove the specified employee from storage.
    //  *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Employee $employee)
    // {
    //     $employee->delete();
    //     return redirect()->route('employees.index')->with('success', 'Employé supprimé avec succès');
    // }
}
    
