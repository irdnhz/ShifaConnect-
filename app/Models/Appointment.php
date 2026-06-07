<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
    'patient_name',
    'caregiver_name',
    'appointment_date',
    'appointment_time',
    'status',
    ];
}
