<x-layouts.app :title="'Perfil de '.$username">
    <section class="row border-bottom">
        <article class="col-md-4 col-12 justify-content-center my-4">
            @include('users.layouts.avatar')
        </article>
        <article class="col-md-8 col-12 my-4">
            <h2 class="text-md-start text-center">{{(is_null($user->name) || is_null($user->surname)) ? $user->username : $user->name . ' ' . $user->surname}}</h2>
            <h4 class="text-secondary text-md-start text-center">{{'@'.$user->username}}</h4>
            <p class="text-md-start text-center">Se unió {{$user->created_at}}</p>    
        </article>
    </section>
    <section class="row">
        @if(count($user->posts) == 0)
        <p class="my-3">No se encontraron notas.</p>
        @endif
    </section>
</x-layouts.app>