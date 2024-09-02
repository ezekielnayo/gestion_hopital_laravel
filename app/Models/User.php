<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    
        use HasFactory, Notifiable;
    
        protected $fillable = [
            'first_name',
            'last_name',
            'email',
            'password',
            'phone',
            'address',
            'gender', 
            'passport_photo',
        ];
    
        public function appointmentsAsEmployee()
        {
            return $this->hasMany(Appointment::class);
        }
    
        public function appointmentsAsPatient()
        {
            return $this->hasMany(Appointment::class, 'patient_id');
        }
        public function appointments()
        {
            return $this->hasMany(Appointment::class, 'user_id');
        }
    
        public function medicalRecords()
        {
            return $this->hasMany(MedicalRecord::class, 'patient_id');
        }
            
    public function Consultation()
    {
        return $this->hasMany(Consultation::class, 'consultation_id');
    }
    public function deaths()
{
    return $this->hasMany(Death::class, 'user_id');
}
    }
