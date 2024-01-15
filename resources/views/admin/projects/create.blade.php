@extends('layouts.app')

@section('content')
    <section>
        <h1>Projects Create</h1>
    </section>

<form action="{{route('admin.projects.store')}}" method="POST">
    @csrf



    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Aggiungi un titolo per il progetto">
    </div>

    <div class="mb-3">
        <label for="typetype_id" class="form-label">Categorie</label>
        <select name="type_id" class="form-control" id="type_id">
          <option>Seleziona una categoria</option>
          @foreach($types as $type)
            <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group mb-3">
        <p>Seleziona la tecnologia:</p>
        <div class="d-flex flex-wrap gap-4 ">
          @foreach ($technologies as $tecnology)
            <div class="form-check">
              <input name="technologies[]" class="form-check-input" type="checkbox" value="{{$tecnology->id}}" id="$tecnology-{{$tecnology->id}}" @checked( in_array($tecnology->id, old('technologies',[]) ) ) >
              <label class="form-check-label" for="$tecnology-{{$tecnology->id}}">
                {{ $tecnology->name }}
              </label>
            </div>
          @endforeach
        </div>
      </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Aggiungi una descrizione"></textarea>
    </div>


    <div>
        <input type="submit" class="btn btn-primary" value="Aggiungi">
    </div>


</form>
<div class="text-center">
    <button><a href="{{route('admin.projects.index')}}">Torna al Catalogo</a></button>

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
