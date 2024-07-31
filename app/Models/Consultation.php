<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'consultation_date',
        'weight',
        'temperature',
        'height',
        'blood_pressure',
        'consultation_reason',
        'symptoms',
        'preliminary_diagnosis',
        'medical_history',
        'chronic_diseases',
        'current_medications',
        'dosage',
        'laboratory_tests',
        'test_results',
        'treatment_plan',
        'follow_up',
        'comments',
    
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
}
}