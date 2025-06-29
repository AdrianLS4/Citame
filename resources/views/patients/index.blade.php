@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Pacientes</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/pacientes/create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus text-info"></i> Paciente</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              @if(session('notification'))
                <div class="alert alert-success" id="notification" role="alert">
                  <i class="fas fa-check"></i>
                  {{ session('notification') }}
                </div>
              @endif
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th> 
                    <th scope="col">Cedula</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Opciones</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                  <tr>
                    <th scope="row">
                      {{ $patient->name }}
                    </th>
                    <td>
                      {{$patient->cedula }}
                    </td>
                     <td>
                      {{$patient->email }}
                    </td>
                     <td>
                      {{$patient->phone }}
                    </td>
                    <td>
                      <form method="POST" action="{{ url('/pacientes/'. $patient->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{url('/pacientes/'. $patient->id .'/edit')}}" class="btn btn-sm btn-primary">editar</a>
                        <button type="submit" class="btn btn-sm btn-danger">eliminar</button>
                      </form>
                        
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
             <div class="card-body">
              {{ $patients->links() }}
            </div>
          </div>
       
@endsection
