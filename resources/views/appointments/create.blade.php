<?php

use Illuminate\Support\Str;

?>
@extends('layouts.panel')

@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Registrar una Cita</h3>
      </div>
      <div class="col text-right">
        <a href="{{url('/pacientes')}}" class="btn btn-sm btn-succes"><i class="fas fa-chevron-left"></i> Regresar</a>
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
    <form method="POST" action="{{ url('/reservarcitas') }}">
      @csrf

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="specialty">Especialidad</label>
          <select name="specialty_id" id="specialty" class="form-control">
            <option value="">Seleccione una especialidad</option>
            @foreach($specialties as $specialty)
            <option value="{{$specialty->id}}">{{$specialty->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="doctor">Medico</label>
          <select name="doctor_id" id="doctor" class="form-control" required></select>
        </div>
      </div>


      <div class="form-group">
        <label for="date">Fecha</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
          </div>
          <input class="form-control datepicker" id="date" name="scheduled_date" placeholder="Seleccionar Fecha" type="text" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" data-date-start-date="{{date('Y-m-d')}}" data-date-end-date="+30d">
        </div>
      </div>

      <div class="form-group">
        <label for="hours">Hora de atencion</label>
        <div class="container">
          <div class="row">
            <div class="col">
              <h4 class="m-3" id="titleMorning"></h4>
              <div id="hoursMorning">
                <mark>
                  <small class="text-warning display-5">Selecciona un medico y una fecha para ver las horas de atencion</small>
                </mark>
              </div>
            </div>
            <div class="col">
              <h4 class="m-3" id="titleAfternoon"></h4>
              <div id="hoursAfternoon">

              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="form-group">
        <label for="phone">Tipo de consulta</label>
        <div class="custom-control custom-radio mt-3 mb-3">
          <input type="radio" id="type1" name="type" class="custom-control-input" value="consulta">
          <label class="custom-control-label" for="type1">Consulta</label>
        </div>
        <div class="custom-control custom-radio mb-3">
          <input type="radio" id="type2" name="type" class="custom-control-input" value="examen">
          <label class="custom-control-label" for="type2">Examen</label>
        </div>
        <div class="custom-control custom-radio mb-5">
          <input type="radio" id="type3" name="type" class="custom-control-input" value="operacion">
          <label class="custom-control-label" for="type3">Operacion Medica</label>
        </div>
      </div>
      <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea name="description" id="description" type="text" class="form-control" rows="5" placeholder="Ingrese una breve descripsion de sus sintomas" required></textarea>
      </div>

      <div class="form-group  text-right">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>

@endsection


@section('scripts')
<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}} "></script>

<script src="{{asset('js/appointments/create.js')}}"></script>

</script>
@endsection