<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduled_date',
        'scheduled_time',
        'type',
        'description',
        'doctor_id',
        'patient_id',
        'specialty_id'
    ];
}
