@extends('layouts.app')

@section('content')
    <section>
        <h1>Projects Edit</h1>
    </section>
    <form class="p-5" action="{{route('admin.projects.update', $project)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title" value="{{ $project->title }}" id="title" placeholder="Modifica titolo per il progetto">
        </div>
        <div class="mb-4">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Modifica descrizione">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="typetype_id" class="form-label">Categorie</label>
            <select name="type_id" class="form-control" id="type_id">
              <option>Seleziona una categoria</option>
              @foreach($types as $type)
                <option @selected( old('type_id', $project->type->id) == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-3">
            <p>Seleziona la tecnologia:</p>
            <div class="d-flex flex-wrap gap-4 ">
              @foreach ($technologies as $technology)
                <div class="form-check">
                  <input name="technologies[]" class="form-check-input" type="checkbox" value="{{$technology->id}}" id="technology-{{$technology->id}}" @checked( in_array($technology->id, old('technologies',$project->technologies->pluck('id')->all()) ) ) >
                  <label class="form-check-label" for="tag-{{$technology->id}}">
                    {{ $technology->name }}
                  </label>
                </div>
              @endforeach
            </div>
          </div>

        <div>
            <input type="submit" class="btn btn-primary" value="Modifica">
        </div>


    </form>
    <div class="text-center">
        <button class="btn btn-primary" ><a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna al Catalogo</a></button>

    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
