<x-layouts.app title="Registro">
    <h1 class="title text-center my-3">Registro</h1>
    <div class="row my-4">
        <div class="col-lg-6 col-12 px-lg-4">
        </div>
        <div class="col-lg-6 col-12 px-lg-4">
            <form method="POST" action="{{route('register')}}">
                @csrf
                <div class="form-group my-5">
                    <input type="text" name="nombre" class="form-control py-2" value="{{old('nombre') ?? ''}}" placeholder="Nombre">
                </div>
                @error('nombre')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <input type="text" name="apellido" class="form-control py-2" value="{{old('apellido') ?? ''}}" placeholder="Apellido">
                </div>
                @error('apellido')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <input type="email" name="email" class="form-control py-2" value="{{old('email') ?? ''}}" placeholder="Correo electronico">
                </div>
                @error('email')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <input type="password" name="password" class="form-control py-2" placeholder="Contraseña">
                </div>
                @error('password')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <input type="password" name="password_confirmation" class="form-control py-2" placeholder="Repite la contraseña">
                </div>
                @error('password_confirmation')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary bg-gradient" value="Registro">
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>