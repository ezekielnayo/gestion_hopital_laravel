<?php

use App\Models\User;
use App\Models\MedicalRecord;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            
            // Définition des clés étrangères
            // $table->foreignIdFor(MedicalRecord::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name'); 
            $table->string('phone')->nullable(); 

            $table->date('consultation_date');
            $table->string('weight')->nullable();
            $table->string('temperature')->nullable();
            $table->string('height')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->text('consultation_reason');
            $table->text('symptoms')->nullable();
            $table->text('preliminary_diagnosis')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('chronic_diseases')->nullable();
            $table->text('current_medications')->nullable();
            $table->text('dosage')->nullable();
            $table->text('laboratory_tests')->nullable();
            $table->text('test_results')->nullable();
            $table->text('treatment_plan')->nullable();
            $table->text('follow_up')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultations');
    }

    
};
