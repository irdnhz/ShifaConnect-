<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalLog extends Model
{
    // Tells Laravel to talk directly to your custom MySQL table
    protected $table = 'medical_logs';

    // Protects your data by strictly limiting what can be saved via forms
    protected $fillable = [
        'blood_pressure',
        'blood_sugar',
        'medication_administered',
        'notes'
    ];
}