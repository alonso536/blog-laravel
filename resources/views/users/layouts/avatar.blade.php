@if(is_null($user->image))
            <img src="{{route('users.image', ['filename' => 'default.png'])}}" class="d-block rounded img-avatar mx-auto" alt="Tu imagen de perfil">
            @auth
            @if($user->image === Auth::user()->image)
            <button class="btn btn-primary btn-sm bg-gradient d-block text-center mx-auto my-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Agregar imagen
            </button>
            @error('image')
            <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
            @enderror
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form method="POST" action="{{route('users.store-image')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-5">
                            <input type="file" id="image" name="image" class="form-control py-2">
                        </div>
                        <div class="form-group my-5 d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary btn-sm bg-gradient" value="Subir imagen">
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @endauth
            @else
            <img src="{{route('users.image', ['filename' => $user->image])}}" class="d-block rounded img-avatar mx-auto" alt="Imagen de perfil de {{$user->username}}">
            @auth
            @if($user->image === Auth::user()->image)
            <button class="btn btn-primary btn-sm bg-gradient d-block text-center mx-auto my-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Cambiar imagen
              </button>
              @error('image')
              <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
              @enderror
              <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                      <form method="POST" action="{{route('users.update-image', ['filename' => Auth::user()->image])}}" enctype="multipart/form-data">
                          @csrf @method('PUT')
                          <div class="form-group my-5">
                              <input type="file" id="image" name="image" class="form-control py-2">
                          </div>
                          <div class="form-group my-5 d-flex justify-content-center">
                              <input type="submit" class="btn btn-primary btn-sm bg-gradient" value="Subir imagen">
                          </div>
                      </form>
                  </div>
              </div>
              <form method="POST" action="{{route('users.destroy-image', ['filename' => Auth::user()->image])}}" enctype="multipart/form-data">
                @csrf @method('DELETE')
                <div class="form-group mt-3 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary btn-sm bg-gradient" value="Borrar imagen">
                </div>
              </form>
              @endif
              @endauth
            @endif