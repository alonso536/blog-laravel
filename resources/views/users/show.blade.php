<x-layouts.app :title="'Perfil de '.$user->username">
    @if(is_null($user->deleted_at))
    <section class="row border-bottom">
        <article class="col-md-4 col-12 justify-content-center my-4">
            @include('users.layouts.avatar')
        </article>
        <article class="col-md-8 col-12 my-4">
            <h2 class="text-md-start text-center">{{(is_null($user->name) || is_null($user->surname)) ? $user->username : $user->name . ' ' . $user->surname}}</h2>
            <h4 class="text-secondary text-md-start text-center">{{'@'.$user->username}}</h4>
            <p class="text-md-start text-center mb-2">Se unió {{\FormatTime::LongTimeFilter($user->created_at)}}</p>
            <div class="d-flex justify-content-md-start justify-content-center">
                <a href="{{route('posts.index', $user->id)}}" class="link">Notas</a>
            </div>   
        </article>
    </section>
    <section class="row">
        @if(count($user->posts) == 0)
        <p class="my-3">No se encontraron notas.</p>
        @else
        <h2 class="py-3">Ultimas notas de {{'@'.$user->username}}</h2>
        @foreach($user->posts as $in => $post)
            @if($in == 3)
                @break
            @endif
        <div class="border-bottom py-3 my-3">
            <h4>{{$post->title}}</h4>
            <p class="paragraph">{{substr($post->content, 0, 235).'...'}}</p>
            <small class="d-block text-secondary mb-3">Escrita {{\FormatTime::LongTimeFilter($post->created_at)}}</small>
            <a href="{{route('posts.show', $post)}}" class="btn btn-primary bg-gradient">Seguir leyendo</a>
        </div>
        @endforeach
        @endif
    </section>
    @else
    <p class="text-md-start text-center">Este usuario ha borrado su cuenta.</p>
    @endif
</x-layouts.app>