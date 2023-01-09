<header>
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="{{route('home')}}">The Basement Notes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('posts')}}">Notas</a>
              </li>
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Iniciar sesión</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Registro</a>
              </li>
              @endguest
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu shadow-sm">
                  <li><a class="nav-link mx-2" href="{{route('users.profile', ['username' => Auth::user()->username, 'id' => Auth::id()])}}">Perfil</a></li>
                  <li><a class="nav-link mx-2" href="{{route('users.dashboard')}}">Configuración</a></li>
                  <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <li><button type="submit" class="btn-logout nav-link mx-2">Cerrar sesión</button></li>
                  </form>
                </ul>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>

</header>