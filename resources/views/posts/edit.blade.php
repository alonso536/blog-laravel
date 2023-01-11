<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <h2 class="p-2">{{$title}}</h2>
            <form method="POST" action="{{route('posts.update', $post)}}">
                @csrf @method('PATCH')
                @include('posts.layouts.form-post')
            </form>
        </article>
    </section>
</x-layouts.app>