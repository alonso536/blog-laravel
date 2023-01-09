<x-layouts.app :title="$title">
    <section class="row">
        @include('users.layouts.aside')
        <article class="col-md-8 col-12 my-4">
            <div class="border-bottom mb-4">
            <h2 class="p-2 pt-0">Información personal</h2>
            <table class="table table-borderless my-5">
                <tbody>
                  <tr>
                    <th scope="row">Nombres:</th>
                    <td>{{(is_null(Auth::user()->name)) ? 'N/A' : Auth::user()->name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Apellidos:</th>
                    <td>{{(is_null(Auth::user()->surname)) ? 'N/A' : Auth::user()->surname}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Nombre de usuario:</th>
                    <td>{{'@'.Auth::user()->username}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Correo electrónico:</th>
                    <td>{{Auth::user()->email}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Teléfono:</th>
                    <td>{{(is_null(Auth::user()->phone)) ? 'N/A' : Auth::user()->phone}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Edad:</th>
                    <td>{{(is_null(Auth::user()->age)) ? 'N/A' : Auth::user()->age}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Te uniste:</th>
                    <td>{{Auth::user()->created_at}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="border-bottom mb-4">
                <h2 class="p-2 pt-0">Información adicional</h2>
                <table class="table table-borderless my-5">
                <tbody>
                  <tr>
                    <th scope="row">Notas escritas:</th>
                    <td>{{count(Auth::user()->posts)}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Comentarios realizados:</th>
                    <td>{{count(Auth::user()->reviews)}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Likes:</th>
                    <td>{{count(Auth::user()->likes)}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div>
                <h2 class="p-2 pt-0">Ultimas notas escritas</h2>
                @if(!count(Auth::user()->posts))
                <p class="p-2">Todavía no has escrito ninguna nota</p>
                @endif
            </div>
        </article>
    </section>
</x-layouts.app>