<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User; // Assuming User model is used for doctors
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = User::doctors()->paginate(10);
        return view('doctors.index')->with(compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
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
                'role' => 'doctor',
                'password' => bcrypt($request->input('password')) // Default password, change as needed
             ]   
        );
        $notification = 'El doctor ha sido creado correctamente.';

        return redirect('/medicos')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = User::findOrFail($id);
        return view('doctors.edit', compact('doctor'));
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

        $user = User::doctors()->findOrFail($id);
        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');
        $password = $request->input('password');
      
        if ($password) {
            $data['password'] = bcrypt($password);
        }
       
        $user->fill($data);
        $user->save();
        $notification = 'La información del doctor se ha actualizado correctamente.';

        return redirect('/medicos')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = User::doctors()->findOrFail($id);
        $doctorName = $doctor->name; 
        $doctor->delete();

        $notification = "El doctor $doctorName se ha eliminado correctamente.";
        return redirect('/medicos')->with(compact('notification'));
    }
}
