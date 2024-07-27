<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id', 'date_of_birth', 'medical_history', 'current_medications'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
