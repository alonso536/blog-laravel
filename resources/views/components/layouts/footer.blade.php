
<div class="footer container-fluid shadow-sm py-3">
    <footer class="py-3 my-3">
      <ul class="nav footer-list justify-content-center pb-3 mb-3">
        <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2">Inicio</a></li>
        <li class="nav-item"><a href="{{route('posts.index')}}" class="nav-link px-2">Notas</a></li>
        @guest
        <li class="nav-item"><a href="{{route('login')}}" class="nav-link px-2">Iniciar sesión</a></li>
        <li class="nav-item"><a href="{{route('register')}}" class="nav-link px-2">Registro</a></li>
        @endguest
        @auth
        <form method="POST" action="{{route('logout')}}">
          @csrf
          <li class="nav-item"><button type="submit" class="btn-logout nav-link px-2">Cerrar sesión</button></li>
        </form>
        @endauth
      </ul>
      <p class="text-center" style="color:#0d6efd">&copy; {{date('Y')}} {{config('app.name')}}, Inc</p>
    </footer>
</div>