@extends('layouts.panel')

@section('content')

<form action="{{ url('horario') }}" method="POST">

  @csrf
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Horario</h3>
        </div>
        <div class="col text-right">
          <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus text-info"></i> guardar</button>
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
      @if(session('errors'))
      <div class="alert alert-danger" id="error" role="alert">
        Los cambios se han guardado, pero hay errores en el horario.
        <ul>
          @foreach(session('errors') as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Dia</th>
            <th scope="col">Activo</th>
            <th scope="col">Turno Mañana</th>
            <th scope="col">Turno Tarde</th>

          </tr>
        </thead>
        <tbody>
          @foreach($horarios as $key => $horario)
          <tr>
            <th scope="row">
              {{ $days[$key] }}
            </th>
            <td>
              <label class="custom-toggle">
                <input type="checkbox" name="active[]" value="{{$key}}" 
                 @if($horario->active)  checked @endif>
                <span class="custom-toggle-slider rounded-circle"></span>
              </label>
            </td>
            <td>
              <div class="row">
                <div class="col">
                  <select class="form-control" name="morning_start[]">
                    @for($i = 8; $i <= 12; $i++)
                      <option value="{{ ($i<10 ? '0' : '').$i }}:00"
                      @if($horario->morning_start == $i.':00 AM') selected @endif  
                      >
                      {{ $i }}:00 AM </option>
                      <option value="{{ ($i<10 ? '0' : '').$i }}:30"
                       @if($horario->morning_start == $i.':30 AM') selected @endif
                      >
                      {{ $i }}:30 AM </option>
                      @endfor
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="morning_end[]">
                    @for($i = 8; $i <= 12; $i++)
                      <option value="{{ ($i<10 ? '0' : '').$i }}:00"
                      @if($horario->morning_end == $i.':00 AM') selected @endif
                      >
                      {{ $i }}:00 AM </option>
                      <option value="{{ ($i<10 ? '0' : '').$i }}:30"
                      @if($horario->morning_end == $i.':30 AM') selected @endif
                      >
                      {{ $i }}:30 AM</option>
                      @endfor
                  </select>
                </div>
            </td>
            <td>
              <div class="row">
                <div class="col">
                  <select class="form-control" name="afternoon_start[]">
                    @for($i = 2; $i <= 11; $i++)
                      <option value="{{ $i+12 }}:00"
                      @if($horario->afternoon_start == $i.':00 PM') selected @endif
                      >
                      {{ $i }}:00 PM </option>
                      <option value="{{ $i+12 }}:30"
                       @if($horario->afternoon_start == $i.':30 PM') selected @endif
                      >
                      {{ $i }}:30 PM </option>
                      @endfor
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="afternoon_end[]">
                    @for($i = 2; $i <= 11; $i++)
                      <option value="{{ $i+12 }}:00"
                       @if($horario->afternoon_end == $i.':00 PM') selected @endif
                      >
                      {{ $i }}:00 PM </option>
                      <option value="{{ $i+12 }}:30"
                       @if($horario->afternoon_end == $i.':30 PM') selected @endif
                      >
                      {{ $i }}:30 PM </option>
                      @endfor
                  </select>
                </div>
              </div>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</form>


@endsection