<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <h2 class="py-2">Borrador</h2>
            <div class="d-flex justify-content-between my-2">
            <a href="{{route('posts.create')}}" class="btn btn-primary bg-gradient">Escribir Nota</a>
            </div>
            @if($posts->count() == 0)
                <p class="py-2">Tu borrador está vacío</p>
            @else
            <table class="table table-bordered my-5">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Texto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><a href="{{route('posts.restore', $post->id)}}" class="link">{{$post->title}}</a></td>
                        <td class="d-flex justify-content-md-start">
                            <form method="POST" action="{{route('posts.restore', $post->id)}}">
                                @csrf @method('PATCH')
                                <input type="submit" class="btn btn-primary btn-sm bg-gradient my-md-0 my-2" value="Restaurar">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </article>
    </section>
</x-layouts.app>