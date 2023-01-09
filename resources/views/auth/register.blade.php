<x-layouts.app title="Registro">
    <h1 class="title text-center my-3">Registro</h1>
    <div class="row my-4">
        <div class="col-lg-6 col-12 px-lg-4">
        </div>
        <div class="col-lg-6 col-12 px-lg-4">
            <form method="POST" action="{{route('register')}}">
                @csrf
                <div class="form-group my-5">
                    <label for="usuario" class="form-label">Nombre de usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control py-2" value="{{old('usuario') ?? ''}}" placeholder="user1234">
                </div>
                @error('usuario')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <label for="email" class="form-label">Correo electronico</label>
                    <input type="email" id="email" name="email" class="form-control py-2" value="{{old('email') ?? ''}}" placeholder="user@example.com">
                </div>
                @error('email')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control py-2">
                </div>
                @error('password')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <label for="password2" class="form-label">Repite la contraseña</label>
                    <input type="password" id="password2" name="password_confirmation" class="form-control py-2">
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