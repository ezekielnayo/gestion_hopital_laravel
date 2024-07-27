<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Patiens;
use App\Models\Employee;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\DB;

class MigratePatientEmployeeData extends Command
{
    protected $signature = 'migrate:patient-employee-data';
    protected $description = 'Migrer les données des tables patients et employés vers la table users';

    public function handle()
    {
        DB::transaction(function () {
            // Migrer les patients
            $patients = Patient::all();
            foreach ($patients as $patient) {
                User::create([
                    'id' => $patient->id,
                    'first_name' => $patient->first_name,
                    'last_name' => $patient->last_name,
                    'email' => $patient->email,
                    'password' => bcrypt('default_password'), // Changez selon vos besoins
                    'phone' => $patient->phone,
                    'address' => $patient->address,
                    'role' => 'patient',
                ]);

                // Mettre à jour les relations
                MedicalRecord::where('patient_id', $patient->id)->update(['patient_id' => $patient->id]);
            }

            // Migrer les employés
            $employees = Employee::all();
            foreach ($employees as $employee) {
                User::create([
                    'id' => $employee->id,
                    'first_name' => $employee->first_name,
                    'last_name' => $employee->last_name,
                    'email' => $employee->email,
                    'password' => bcrypt('default_password'), // Changez selon vos besoins
                    'phone' => $employee->phone,
                    'specialty' => $employee->specialty,
                    'role' => 'employee',
                ]);

                // Mettre à jour les relations spécifiques si nécessaire
            }
        });

        $this->info('Migration des données des patients et des employés terminée.');
    }//
    }
