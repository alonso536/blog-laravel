<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <h2 class="py-2">Notas que me gustan</h2>
            @foreach($likes as $like)
            <div class="border-bottom py-3 my-3">
                <h4>{{$like->post->title}}</h4>
                <h5>
                    <a href="{{route('users.profile', ['username' => $like->post->user->username, 'id' => $like->post->user->id])}}" class="link">{{'@'.$like->post->user->username}}</a>
                </h5>
                <p class="paragraph">{{substr($like->post->content, 0, 235).'...'}}</p>
                <small class="d-block text-secondary mb-3">Escrita {{\FormatTime::LongTimeFilter($like->post->created_at)}}</small>
                <a href="{{route('posts.show', $like->post)}}" class="btn btn-primary bg-gradient">Seguir leyendo</a>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{$likes->links()}}
            </div>
        </article>
    </section>
</x-layouts.app>