<x-layouts.app title="Iniciar sesión">
    <h1 class="title text-center my-3">Iniciar sesión</h1>
    <div class="row my-4">
        <div class="col-lg-4 px-lg-4">
        </div>
        <div class="col-lg-4 col-12 px-4">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group my-5">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="form-control py-2" value="{{old('email') ?? ''}}">
                </div>
                <div class="form-group my-5">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control py-2">
                </div>
                <div class="form-group my-5 d-flex justify-content-start">
                    <label for="remember" class="form-label m-0">Recuérdame</label>
                    <input type="checkbox" name="remember" class="form-check m-0 mx-2">
                </div>
                @error('login')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group my-5 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary bg-gradient" value="Iniciar sesión">
                </div>
            </form>
            <div class="d-flex flex-column justify-content-evenly my-5">
                <a href="{{route('register')}}" class="link mx-auto my-2">Crear cuenta</a>
                <a href="{{route('password.request')}}" class="link mx-auto my-2">Olvide mi contraseña</a>
            </div>
        </div>
        <div class="col-lg-4 px-lg-4">
        </div>
    </div>
</x-layouts.app>