<aside class="col-md-4 col-12 my-4">
    <h2 class="mb-5 p-2">Dashboard</h2>
    <ul class="ul d-flex flex-column justify-content-between">
        <li><a href="{{route('users.dashboard')}}" class="link">{{Auth::user()->username}}</a></li>
        <li><a href="{{route('users.edit-profile')}}" class="link">Editar perfil</a></li>
        <li><a href="{{route('users.edit-password')}}" class="link">Cambiar contraseña</a></li>
        <li><a href="{{route('users.posts')}}" class="link">Mis notas</a></li>
        <li><a href="{{route('users.reviews')}}" class="link">Mis comentarios</a></li>
        <li><a href="{{route('users.likes')}}" class="link">Mis likes</a></li>
        <li><a href="{{route('users.delete')}}" class="link">Desactivar cuenta</a></li>
    </ul>
</aside>