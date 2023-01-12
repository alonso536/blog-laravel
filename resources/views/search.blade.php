<div class="d-flex flex-column justify-content-center">
    <h3 class="text-center my-3 py-3">{{$header ?? 'Ultimas notas agregadas'}}</h3>
    @if(isset($error))
    <p>La búsqueda no arrojó ningún resultado</p>
    @else
    @foreach($posts as $post)
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
    @if(isset($header))
        <div class="d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    @endif
    @endif
</div>