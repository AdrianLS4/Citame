New Page!!@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nueva Especialidad</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/especialidades')}}" class="btn btn-sm btn-succes"><i class="fas fa-chevron-left"></i> Regresar</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                @if($errors->any)
                
                        @foreach($errors->all() as $error)
                           <div class="alert alert-danger" role="alert">
                              <i class="fas fas-exclamation-triangle"></i>
                              <strong>Por Favor!!</strong> {{ $error}}
                          </div>
                        @endforeach
                    
                @endif
                <form method="POST" action="{{ url('/especialidades') }}">
                    @csrf
                    <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Nombre de la especialidad" required>
                    </div>
                    <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3" value="{{old('description')}}" placeholder="Descripción de la especialidad"></textarea>
                    </div>
                    <div class="form-group  text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>    
                    </div>
                </form>
                </div>
            </div>
       
@endsection
