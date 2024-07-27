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
    ];
    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
