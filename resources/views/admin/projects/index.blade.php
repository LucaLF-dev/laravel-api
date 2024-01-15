@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="text-center"> Projects </h1>
            <div class="row justify-content-center">
                @foreach ($projects as $project)
                <div class="col-3 my-4" >
                    <div class="card h-100" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-end gap-2">
                            <h5 class="card-title">{{$project->title}}</a></h5>
                            <h6> {{ isset($project->type) ? $project->type->name : ''}}</h6>


                            <a class="btn btn-primary text-light text-decoration-none" href="{{route('admin.projects.show', $project->id)}}">Dettagli</a></button>

                        </div>
                    </div>

                </div>
                @endforeach
                <div class="text-center">
                    <a class="text-light text-decoration-none btn btn-success" href="{{route('admin.projects.create')}}">New Project</a>
                </div>

            </div>
        </div>

    </section>


@endsection
