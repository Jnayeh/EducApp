@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <a href="homeworks_prof/create" class="btn btn-primary mb-2">Aouter Homework</a>
        <div class="cards-container">

            @foreach ($home_works as $home_work)
                <div class="card ">
                    <img src="{{ url($home_work->photo) }}" class="card-img-top card-image " alt="photo">
                    <div class="card-body">

                        Pour les classes: <p class="card-text d-flex justify-content-space-around">
                            @foreach ($home_work->professeur->classes as $classe)
                                <span>{{ $classe->name }}</span>
                            @endforeach
                        </p>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-end g-2">
                        <div>
                            <a href="prof_homeworks/{{ $home_work->id }}" class="btn btn-outline-secondary">
                                Afficher les réponses</a>
                            <a href="homeworks_prof/{{ $home_work->id }}/edit" class="btn btn-primary">Modifier</a>
                        </div>
                    </div>

                    <div class="card-footer text-center text-muted">Crée le:
                        {{ date('Y-m-d', strtotime($home_work->created_at)) }}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
