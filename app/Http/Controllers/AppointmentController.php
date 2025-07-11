<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {

        $specialties = Specialty::all();
        return view('appointments.create', compact('specialties'));
    }
    
    public function store(Request $request)
    {
        $rules = [
            'scheduled_time' => 'required',
            'type' => 'required',
            'description' => 'required',
            'doctor_id' => 'exists:users,id',
            'specialty_id' => 'exists:specialties,id'
        ];

        $messages = [
            'scheduled_time.required' => 'La hora de atencion es requerida',
            'type.required' => 'El tipo de cita es requerido',
            'description.required' => 'Debe ingresar sus sintomas o motivo de la consulta',

        ];


        $this->validate($request, $rules, $messages);


        $data = $request->only([
            'scheduled_date',
            'scheduled_time',
            'type',
            'description',
            'doctor_id',
            'specialty_id'
        ]);

        $data['patient_id'] = auth()->id();
        
        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');

        Appointment::create($data);

        $notification = "La cita ha sido reservada correctamente, por favor revise su correo para mas detalles";

        return back()->with(compact('notification'));
    }
}
