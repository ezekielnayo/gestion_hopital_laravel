<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'specialty',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'employee_id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }

}
