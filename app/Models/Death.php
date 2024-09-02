<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',           // ID de l'utilisateur (le défunt)
    'death_date',        // Date du décès
    'death_time',        // Heure du décès
    'place_of_death',    // Lieu du décès
    'cause_of_death',    // Cause du décès
    'doctor_name',       // Nom du médecin
    'certification_date',// Date de certification
    ];      // 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
