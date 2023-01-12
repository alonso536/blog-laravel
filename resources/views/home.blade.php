<x-layouts.app title="Home">
    <div class="row my-4">
        <article class="col-lg-8 col-12 px-lg-4">
            <h3 class="text-center py-3">Búsqueda</h3>
            <form method="GET" action="{{route('home.search')}}" class="row border-bottom pb-4">
                @csrf
                <div class="form-group col-md-10 col-12 my-3">
                    <input type="search" id="search" name="search" class="form-control py-2" value="{{old('search') ?? ''}}" placeholder="Búsqueda">
                </div>
                <div class="form-group col-md-2 my-3 d-flex justify-content-start">
                    <input type="submit" class="btn btn-primary bg-gradient" value="Buscar">
                </div>
            </form>
            @include('search')
        </article>
        <aside class="col-lg-4 col-12 px-lg-4">
            <h3 class="text-center py-3">Usuarios destacados</h3>
            <div class="d-flex flex-column justify-content-center">
                @foreach($users as $user)
                <div class="d-flex justify-content-md-start my-3">
                @if($user->image)
                    <img src="{{route('users.image', ['filename' => $user->image])}}" class="rounded img-home mx-4" alt="Tu imagen de perfil">
                @else
                    <img src="{{route('users.image', ['filename' => 'default.png'])}}" class="rounded img-home mx-4" alt="Tu imagen de perfil">
                @endif
                    <div class="text-md-start text-center">
                        <h5><a href="{{route('users.profile', ['username' => $user->username, 'id' => $user->id])}}" class="link">{{'@'.$user->username}}</a></h5>
                        <p class="text-secondary">Activo {{\FormatTime::LongTimeFilter($user->created_at)}}<p>
                    </div>
                </div>
                @endforeach
            </div>
        </aside>
    </div>
</x-layouts.app>
