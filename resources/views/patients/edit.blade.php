@extends('layouts.panel')

@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Editar medico</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/medicos')}}" class="btn btn-sm btn-succes"><i class="fas fa-chevron-left"></i> Regresar</a>
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
                <form method="POST" action="{{ url('/pacientes/'.$patient->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $patient->name)}}" placeholder="Nombre Completo del Doctor">
                    </div>
                    <div class="form-group">
                    <label for="cedula">Cedula</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" rows="3" value="{{old('cedula',$patient->cedula)}}" placeholder="12345678">
                    </div>
                    <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input type="text" class="form-control" id="email" name="email" rows="3" value="{{old('email', $patient->email)}}" placeholder="ejemplo@ejemplo.com">
                    </div>
                    <div class="form-group">
                    <label for="phone">Telefono/Movil</label>
                    <input type="text" class="form-control" id="phone" name="phone" rows="3" value="{{old('phone', $patient->phone)}}" placeholder="+584611222222">
                    </div>
                    <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" class="form-control" id="address" name="address" rows="3" value="{{old('address', $patient->address)}}" placeholder="+584611222222">
                    </div>

                    <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" class="form-control" id="password" name="password" rows="3" >
                    <small class="form-text text-danger">Dejar en blanco si no desea cambiar la contraseña</small>
                    </div>

                    <div class="form-group  text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>    
                    </div>
                </form>
                </div>
            </div>
       
@endsection
