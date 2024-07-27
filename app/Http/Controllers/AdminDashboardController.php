<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Employee;
use app\Models\User;
use app\Models\Appointment;

class AdminDashboardController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string|max:15',
            'speciality' => 'required|string|max:255',
        ]);

        // $employee = new Employee();

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'speciality' => $request->speciality,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Médecin ajouté avec succès');
    }


    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'phone' => 'required|string|max:15',
    
            'speciality' => 'required|string|max:255',
        ]);

        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'speciality' => $request->speciality,
            
        ]);

        return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employé supprimé avec succès.');
    }
}
