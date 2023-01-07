<x-layouts.app title="Iniciar sesión">
    <h1 class="title text-center my-3">Verificar email</h1>
    <div class="row my-4">
        <div class="col-lg-4 px-lg-4">
        </div>
        <div class="col-lg-4 col-12 px-4">
            <p class="paragraph my-3">Hemos enviado un correo electronico a <b>{{Auth::user()->email}}.</b> Por favor verifica tu email para empezar a usar tu cuenta.</b></p>
            <form class="d-flex justify-content-center" method="POST" action="{{route('verification.send')}}">
                @csrf
                <button type="submit" class="btn btn-primary bg-gradient mt-4">No he recibido ningún email</button>
            </form>
        </div>
        <div class="col-lg-4 px-lg-4">
        </div>
    </div>
</x-layouts.app>