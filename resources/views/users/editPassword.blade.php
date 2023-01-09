<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <form method="POST" action="{{route('users.update-password')}}">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label for="password_old" class="form-label">Contraseña actual</label>
                    <input type="password" id="password_old" name="password_old" class="form-control py-2">
                </div>
                @error('password_old')
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
                    <input type="submit" class="btn btn-primary bg-gradient" value="Cambiar contraseña">
                </div>
            </form>
        </article>
    </section>
</x-layouts.app>