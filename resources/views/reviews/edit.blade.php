<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <h2 class="py-2">{{$post->title}}</h2>
            <h5>
                <a href="{{route('users.profile', ['username' => $post->user->username, 'id' => $post->user->id])}}" class="link">{{'@'.$post->user->username}}</a>
            </h5>
            <p class="paragraph">{{$post->content}}</p>
            <form method="POST" action="{{route('reviews.update', $review)}}">
                @csrf @method('PATCH')
                <div class="form-group my-3">
                    <label for="contenido" class="form-label">Contenido</label>
                    <textarea id="contenido" name="contenido" class="form-control py-2" placeholder="Escribe un comentario">{{old('contenido', $review->content)}}</textarea>
                </div>
                @error('contenido')
                <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                @enderror
                <div class="form-group d-flex justify-content-start">
                    <input type="submit" class="btn btn-primary bg-gradient" value="Editar comentario">
                </div>
            </form>
        </article>
    </section>
</x-layouts.app>