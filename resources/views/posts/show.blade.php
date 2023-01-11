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
            <div class="row border-bottom pb-3">
                <form method="POST" action="">
                    @csrf
                    <div class="form-group d-flex justify-content-start">
                        <input type="submit" class="btn btn-primary bg-gradient" value="Me gusta">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>