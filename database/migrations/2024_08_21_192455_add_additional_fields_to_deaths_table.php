<?php

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
    schema::table('deaths', function (Blueprint $table) {
        $table->time('death_time')->nullable(); // Heure du décès
        $table->string('place_of_death'); // Lieu du décès
        $table->string('cause_of_death')->nullable(); // Cause du décès
        $table->string('doctor_name'); // Nom du médecin
        $table->date('certification_date')->nullable();
         // Date de certification
       
        // Clé étrangère pour 'declared_by'
    });
}

/**
 * Reverse the migrations.
 */
public function down()
{
    Schema::table('deaths', function (Blueprint $table) {
        $table->dropColumn([
            'death_time',
            'place_of_death',
            'cause_of_death',
            'doctor_name',
            'certification_date',
        ]);
    });
}



};
