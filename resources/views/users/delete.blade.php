<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <h2 class="p-2">Desactivar cuenta</h2>
            <p class="p-2">¿Estás seguro que deseas desactivar tu cuenta?</p>
            <form method="POST" action="{{route('users.destroy', Auth::id())}}">
                @csrf @method('DELETE')
                <div class="form-group m-2 d-flex justify-content-start">
                    <input type="submit" class="btn btn-danger bg-gradient" value="Desactivar cuenta">
                </div>
            </form>
        </article>
    </section>
</x-layouts.app>