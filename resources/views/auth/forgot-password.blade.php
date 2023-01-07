<x-layouts.app title="Restablecer contraseña">
    <h1 class="title text-center my-3">Restablecer contraseña</h1>
    <div class="row my-4">
        <div class="col-lg-4 px-lg-4">
        </div>
        <div class="col-lg-4 col-12 px-4">
            <form method="POST" action="{{route('password.email')}}">
                @csrf
                <div class="form-group my-5">
                    <input type="email" name="email" class="form-control py-2" placeholder="Correo electrónico">
                </div>
                @error('email')
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