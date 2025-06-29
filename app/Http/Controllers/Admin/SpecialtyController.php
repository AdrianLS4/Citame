<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Controllers\Controller;

use function Symfony\Component\VarDumper\Dumper\esc;

class SpecialtyController extends Controller
{


    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }
    public function sendData(Request $request)
    {
       $rules = [
            'name' => 'required|string|min:3',
        ];
        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.string' => 'El nombre de la especialidad debe ser una cadena de texto.',
            'name.min' => 'El nombre de la especialidad debe tener al menos 3 caracteres.',
        ];
       
        $this->validate($request, $rules, $messages);


        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = 'La especialidad se ha creado correctamente.';
        return redirect('/especialidades')->with(compact('notification'));

    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)
    {
        $rules = [
            'name' => 'required|string|min:3',
        ];
        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.string' => 'El nombre de la especialidad debe ser una cadena de texto.',
            'name.min' => 'El nombre de la especialidad debe tener al menos 3 caracteres.',
        ];

        $this->validate($request, $rules, $messages);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = 'La especialidad se ha actualizado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {

        $specialityName = $specialty->name;
        $specialty->delete();
        $notification = 'La especialidad' . $specialityName . 'se ha eliminado correctamente.';
        return redirect('/especialidades')->with(compact('notification'));

    }
}
