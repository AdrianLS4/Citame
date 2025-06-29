    <!-- Heading -->
    <h6 class="navbar-heading text-muted">
      @if (auth()->user()->role == 'admin')
        Gestion
      @else
        Menu
      @endif  
  </h6>
<ul class="navbar-nav">.
        @if (auth()->user()->role == 'admin')
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{ url('home') }}">
              <i class="ni ni-tv-2 text-danger"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('especialidades') }}">
              <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="medicos">
              <i class="fas fa-stethoscope text-info"></i> Medicos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="pacientes">
              <i class="fas fa-bed text-warning"></i> Pacientes
            </a>
          </li>
        @elseif (auth()->user()->role == 'doctor')
          <li class="nav-item">
            <a class="nav-link " href="/horario">
              <i class="far fa-calendar-alt text-info"></i> Gestionar Horarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="pacientes">
              <i class="fas fa-clock text-success"></i> Mis Citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="pacientes">
              <i class="fas fa-bed text-warning"></i> Mis Pacientes
            </a>
          </li>
          @else
            <li class="nav-item">
              <a class="nav-link " href="pacientes">
                <i class="fas fa-calendar-plus text-default"></i> Reservar Cita
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="pacientes">
                <i class="fas fa-clock text-success"></i> Mis Citas
              </a>
            </li>
        @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-in-alt"></i> Cerrar sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>

        @if (auth()->user()->role == 'admin')
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-books text-default"></i> Citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño Medico
            </a>
          
          </li>
      @endif