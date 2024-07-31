<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $fillable =[
       'date_of_birth', 'medical_history', 'current_medications','user_id',
        'blood_group',
        'allergies','date_consult',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function consultations()
{
     return $this->hasMany(Consultation::class);
 }
}
