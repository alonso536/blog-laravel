<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <h2 class="py-2">Mis Comentarios</h2>
            @if(!count(Auth::user()->reviews))
                <p class="py-2">No has escrito ningún comentario</p>
            @else
            <table class="table table-bordered my-5">
                <thead>
                    <tr>
                        <th>Nota</th>
                        <th>Comentario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->reviews as $review)
                    @if(is_null($review->post))
                        @continue
                    @endif
                    <tr>
                        <td><a href="{{route('posts.show', $review->post->id)}}" class="link">{{$review->post->id}}</a></td>
                        <td>{{(strlen($review->content) > 20) ? substr($review->content, 0, 15).'...' : $review->content}}</td>
                        <td class="d-flex justify-content-md-evenly">
                            <a href="{{route('reviews.edit', ['post' => $review->post, 'review' => $review])}}" class="btn btn-primary btn-sm bg-gradient my-md-0 my-2">Editar</a>
                            <form method="POST" action="{{route('reviews.destroy', $review)}}">
                                @csrf @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm bg-gradient my-md-0 my-2" value="Borrar">
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