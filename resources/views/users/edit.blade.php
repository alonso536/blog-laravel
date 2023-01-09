<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <form method="POST" action="{{route('users.update-profile')}}">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label for="usuario" class="form-label">Nombre de usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control py-2" value="{{old('usuario', Auth::user()->username)}}" >
                </div>
                @error('usuario')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <label for="nombre" class="form-label">Nombres</label>
                    <input type="text" id="nombre" name="nombre" class="form-control py-2" value="{{old('nombre', Auth::user()->name ?? '')}}">
                </div>
                @error('nombre')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <label for="apellido" class="form-label">Apellidos</label>
                    <input type="text" id="apellido" name="apellido" class="form-control py-2" value="{{old('apellido', Auth::user()->surname ?? '')}}">
                </div>
                @error('apellido')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" class="form-control py-2" value="{{old('telefono', Auth::user()->phone ?? '')}}">
                </div>
                @error('telefono')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" id="edad" name="edad" class="form-control py-2" value="{{old('edad', Auth::user()->age ?? '')}}">
                </div>
                @error('edad')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary bg-gradient" value="Actualizar datos">
                </div>
            </form>
        </article>
    </section>
</x-layouts.app>