@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <div class="cards-container">

            @foreach ($home_works as $home_work)
                @foreach ($eleves as $eleve)
                    @if ($home_work->professeur->classes->contains($eleve->classe))
                        <div class="card ">
                            <img src="{{ url($home_work->photo) }}" class="card-img-top card-image " alt="photo">
                            <div class="card-body">
                                <h5 class="card-title">Homework de {{ $home_work->professeur->name }} </h5>
                                <p class="card-text">Pour l'eleve: {{ $eleve->name }}</p>
                                <p class="card-text">A propos la matiere: {{ $home_work->professeur->matiere->nom }}
                                </p>
                            </div>

                            <div class="card-body d-flex flex-column justify-content-end g-2">
                                <div>
                                    <a href="parent_homeworks/{{ $home_work->id }}/eleve/{{ $eleve->id }}"
                                        class="btn btn-outline-secondary mx-1">Ajouter une réponse</a>
                                    <a href="{{ url($home_work->photo) }}" target="blank"
                                        class="btn btn-outline-primary mx-1">Afficher</a>
                                </div>
                            </div>

                            <div class="card-footer text-center text-muted">Crée le:
                                {{ date('Y-m-d', strtotime($home_work->created_at)) }}
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach

        </div>
    </div>
@endsection
