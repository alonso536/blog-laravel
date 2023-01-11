<div class="form-group my-5">
    <label for="titulo" class="form-label">Texto</label>
    <input type="text" id="texto" name="texto" class="form-control py-2" value="{{$post->title ?? old('texto', '')}}" placeholder="Libro Cap:Vers">
</div>
@error('texto')
    <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
@enderror
<div class="form-group my-5">
    <label for="contenido" class="form-label">Contenido</label>
    <textarea id="contenido" name="contenido" class="form-control py-2" style="height: 200px">{{$post->content ?? old('contenido', '')}}</textarea>
</div>
@error('contenido')
    <p class="alert alert-danger my-3 py-2" role="alert">{{$message}}</p>
@enderror
<div class="form-group m-2 d-flex justify-content-start">
    <input type="submit" class="btn btn-primary bg-gradient" value="{{$title}}">
</div>