<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <h2 class="py-2">Mis Notas</h2>
            <p>Aqui puedes gestionar tus notas. Si escoges borrarlas, estas pasarán al borrador y nadie más podrá visualizarlas, pero puedes restaurarlas cuando lo desees.</p>
            <div class="d-flex justify-content-between my-2">
            <a href="{{route('posts.create')}}" class="btn btn-primary bg-gradient">Escribir Nota</a>
            <a href="{{route('users.trashed', Auth::id())}}" class="btn btn-primary bg-gradient">Ver borrador</a>
            </div>
            <table class="table table-bordered my-3">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Texto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->posts->reverse() as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><a href="{{route('posts.show', $post)}}" class="link">{{$post->title}}</a></td>
                        <td class="d-flex justify-content-md-evenly">
                            <a href="{{route('posts.edit', $post)}}" class="btn btn-primary btn-sm bg-gradient my-md-0 my-2">Editar</a>
                            <form method="POST" action="{{route('posts.destroy', $post)}}">
                                @csrf @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm bg-gradient my-md-0 my-2" value="Borrar">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </section>
</x-layouts.app>