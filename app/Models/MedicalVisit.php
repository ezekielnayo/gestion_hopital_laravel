<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalVisit extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'reason',  'visit_date', 'observations'];
    
    // MedicalVisit.php




    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
