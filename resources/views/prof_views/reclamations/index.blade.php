@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <a href="reclamations_prof/create" class="btn btn-primary mb-2">Aouter Reclamation</a>
        <div class="cards-container">
            @foreach ($reclamations as $reclamation)
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">{{ $reclamation->titre }} </h5>
                        <h4 class="card-text">Pour l'eleve: {{ $reclamation->eleve->name }}</h4>
                        <p>{{ substr($reclamation->details, '0', '50') . '...' }}</p>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-end g-2">
                        <a href="prof_reclamations/{{ $reclamation->id }}"
                            class="btn btn-outline-primary mx-1">Afficher</a>

                    </div>

                    <div class="card-footer text-center text-muted">Crée le:
                        {{ date('Y-m-d', strtotime($reclamation->created_at)) }}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
