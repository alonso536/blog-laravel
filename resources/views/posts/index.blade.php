<x-layouts.app title="Notas">
    <div class="row my-4">
        <div class="col-lg-4 col-12 px-lg-4">
            <h3 class=" text-center py-3">Filtros</h3>
        </div>
        <div class="col-lg-8 col-12 px-lg-4">
            <h1 class="title text-center my-3">Notas</h1>
            @foreach ($posts as $post)
            <div class="border-bottom py-3 my-3">
                <h3>{{$post->title}}</h3>
                <h5>
                    <a href="{{route('users.profile', ['username' => $post->user->username, 'id' => $post->user->id])}}" class="link">{{'@'.$post->user->username}}</a>
                </h5>
                <p class="paragraph">{{substr($post->content, 0, 235).'...'}}</p>
                <small class="d-block text-secondary mb-3">Escrita {{\FormatTime::LongTimeFilter($post->created_at)}}</small>
                <a href="{{route('posts.show', $post)}}" class="btn btn-primary bg-gradient">Seguir leyendo</a>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
            {{$posts->links()}}
            </div>
        </div>
    </div>
</x-layouts.app>