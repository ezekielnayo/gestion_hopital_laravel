<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;  

    // protected $table = 'appointments';

    protected $fillable = [
        'user_id',
        'appointment_date',
        'motif',
        'status', 
    ];
    public function user()
       {
           return $this->belongsTo(User::class);
       }

    // public function employee()
    // {
        // return $this->belongsTo(Employee::class);
    // }

    
}
