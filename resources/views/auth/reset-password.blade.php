<x-layouts.app title="Restablecer contraseña">
    <h1 class="title text-center my-3">Restablecer contraseña</h1>
    <div class="row my-4">
        <div class="col-lg-4 px-lg-4">
        </div>
        <div class="col-lg-4 col-12 px-4">
            <form method="POST" action="{{route('password.update')}}">
                @csrf
                <div class="form-group my-5">
                    <input type="hidden" name="token" value="{{ $token }}">
                </div>
                <div class="form-group my-5">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="form-control py-2" value="{{ old('email', $_GET['email']) }}">
                </div>
                @error('email')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <label for="password" class="form-label">Nueva contraseña</label>
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
                    <input type="submit" class="btn btn-primary bg-gradient" value="Restablecer contraseña">
                </div>
            </form>
        </div>
        <div class="col-lg-4 px-lg-4">
        </div>
    </div>
</x-layouts.app>