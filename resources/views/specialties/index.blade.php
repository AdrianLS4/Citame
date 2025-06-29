@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Especialidades</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/especialidades/create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus text-info"></i> Especialidad</a>
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
                    <th scope="col">Descripsion</th>
                    <th scope="col">Opciones</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($specialties as $especialidad)
                  <tr>
                    <th scope="row">
                      {{ $especialidad->name }}
                    </th>
                    <td>
                      {{$especialidad->description }}
                    </td>
                    <td>
                      <form method="POST" action="{{ url('/especialidades/'. $especialidad->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{url('/especialidades/'. $especialidad->id .'/edit')}}" class="btn btn-sm btn-primary">editar</a>
                        <button type="submit" class="btn btn-sm btn-danger">eliminar</button>
                      </form>
                        
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>

@endsection
