<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
    public function ad()
    {
        return $this->hasMany(user::class);
    }

}
