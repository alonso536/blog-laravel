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
                    <input type="email" name="email" class="form-control py-2" value="{{ old('email') ?? $_GET['email'] }}" placeholder="Correo electrónico">
                </div>
                @error('email')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5">
                    <input type="password" name="password" class="form-control py-2" placeholder="Nueva contraseña"">
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
                    <input type="submit" class="btn btn-primary bg-gradient" value="Restablecer contraseña">
                </div>
            </form>
        </div>
        <div class="col-lg-4 px-lg-4">
        </div>
    </div>
</x-layouts.app>