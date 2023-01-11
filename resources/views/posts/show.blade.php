<x-layouts.app :title="$post->title">
    <h1 class="title text-center my-3">{{$post->title}}</h1>
    <div class="row my-4">
        <div class="col-12 px-lg-4">
            <div class="row py-3 my-lg-3 mb-0">
                <div class="col-lg-3 col-12 mt-1 d-flex justify-content-lg-start justify-content-center">
                    @if(is_null($post->user->image))
                    <img src="{{route('users.image', ['filename' => 'default.png'])}}" class="rounded img-post-show" alt="Imagen de perfil de {{$post->user->username}}">
                    @else
                    <img src="{{route('users.image', ['filename' => $post->user->image])}}" class="rounded img-post-show" alt="Imagen de perfil de {{$post->user->username}}">
                    @endif
                </div>
                <div class="col-lg-9 col-12">
                    <h5 class="mt-lg-0 mt-4 mb-3">
                        Escrita por: <a href="{{route('users.profile', ['username' => $post->user->username, 'id' => $post->user->id])}}" class="link">{{'@'.$post->user->username}}</a>
                    </h5>
                    <p class="paragraph">{{$post->content}}</p>
                    <small class="d-block text-secondary mb-3">Escrita {{\FormatTime::LongTimeFilter($post->created_at)}}</small>
                </div>
            </div>
            <div class="row pb-3">
                @if(Auth::check() && $post->likes->contains('user_id', Auth::id()))
                <form method="POST" action="{{route('likes.destroy', ['post' => $post, 'user' => Auth::user()])}}">
                    @csrf @method('DELETE')
                    <div class="form-group d-flex justify-content-start">
                        <input type="submit" class="btn btn-danger bg-gradient" value="Ya no me gusta ({{count($post->likes)}})">
                    </div>
                </form>
                @else
                <form method="POST" action="{{route('likes.store', $post)}}">
                    @csrf
                    <div class="form-group d-flex justify-content-start">
                        <input type="submit" class="btn btn-primary bg-gradient" value="Me gusta ({{count($post->likes)}})">
                    </div>
                </form>
                @endif
            </div>
            <div class="row pb-3">
                <div class="col-md-8 col-12">
                    @if(session('like'))
                    <div class="alert alert-primary my-3 py-2" role="alert">
                        {{session('like')}}
                    </div>
                    @endif
                    @error('contenido')
                    <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                    @enderror
                    <h3 class="border-bottom pt-2 pb-4">Comentarios ({{count($post->reviews)}})</h3>
                    <form method="POST" action="{{route('reviews.store', $post)}}" class="border-bottom pb-3">
                        @csrf
                        <div class="form-group my-3">
                            <label for="contenido" class="form-label">Contenido</label>
                            <textarea id="contenido" name="contenido" class="form-control py-2" placeholder="Escribe un comentario">{{old('contenido', '')}}</textarea>
                        </div>
                        @error('contenido')
                        <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
                        @enderror
                        <div class="form-group d-flex justify-content-start">
                            <input type="submit" class="btn btn-primary btn-sm bg-gradient" value="Enviar">
                        </div>
                    </form>
                    <div id="reviews" class="my-3">
                        @if(!count($post->reviews))
                        <p>Esta nota no tiene ningún comentario</p>
                        @else
                        @foreach($post->reviews as $review)
                        <div class="border-bottom py-3 my-3">
                            <h5>
                                <a href="{{route('users.profile', ['username' => $review->user->username, 'id' => $review->user->id])}}" class="link">{{'@'.$review->user->username}}</a>
                            </h5>
                            <p class="paragraph mb-2">{{$review->content}}</p>
                            <small class="d-block text-secondary mb-3">{{\FormatTime::LongTimeFilter($review->created_at)}}</small>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-12">
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>