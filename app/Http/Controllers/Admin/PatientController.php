<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User; // Assuming User model is used for patients
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = User::patients()->paginate(10); // Assuming you have a Patient model
        return view('patients.index')->with(compact('patients'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required'  
        ];

        $messages = [
            'name.required' => 'El nombre del doctor es obligatorio.',
            'name.min' => 'El nombre del doctor debe tener al menos 3 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'cedula.required' => 'La cédula es obligatoria.',
            'cedula.digits' => 'La cédula debe tener 10 dígitos.',
            'address.required' => 'La dirección es obligatoria.',
            'address.min' => 'La dirección debe tener al menos 5 caracteres.',
            'phone.required' => 'El teléfono es obligatorio.'
        ];

        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone') 
            + 
            [
                'role' => 'paciente',
                'password' => bcrypt($request->input('password')) // Default password, change as needed
             ]   
        );
        $notification = 'El paciente ha sido creado correctamente.';

        return redirect('/pacientes')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                        
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required'  
        ];

        $messages = [
            'name.required' => 'El nombre del doctor es obligatorio.',
            'name.min' => 'El nombre del doctor debe tener al menos 3 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'cedula.required' => 'La cédula es obligatoria.',
            'cedula.digits' => 'La cédula debe tener 10 dígitos.',
            'address.required' => 'La dirección es obligatoria.',
            'address.min' => 'La dirección debe tener al menos 5 caracteres.',
            'phone.required' => 'El teléfono es obligatorio.'
        ];

        $this->validate($request, $rules, $messages);
        $user = User::patients()->findOrFail($id);
        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');
        $password = $request->input('password');
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $user->fill($data);
        $user->save();
        
        $notification = 'El paciente se ha actualizado correctamente.';

        return redirect('/pacientes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = User::patients()->findOrFail($id);
        $patientName = $patient->name; 
        $patient->delete();

        $notification = "El paciente $patientName se ha eliminado correctamente.";
        return redirect('/pacientes')->with(compact('notification'));
    }
}
