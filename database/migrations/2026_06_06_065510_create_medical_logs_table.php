<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
Schema::create('medical_logs', function (Blueprint $table) {
            $table->id(); // Primary Key
            
            // Temporary plain ID numbers so it won't crash if your friends haven't coded their tables yet!
            $table->unsignedBigInteger('appointment_id')->nullable(); 
            $table->unsignedBigInteger('caregiver_id')->nullable(); 
            
            // Health tracking input boxes
            $table->string('blood_pressure')->nullable(); 
            $table->float('blood_sugar')->nullable();     
            $table->text('medication_administered');      
            $table->text('notes')->nullable();            
            
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medical_logs');
    }
};