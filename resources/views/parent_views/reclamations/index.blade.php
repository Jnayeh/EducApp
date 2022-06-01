@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <a href="reclamations_parent/create" class="btn btn-primary mb-2">Aouter Reclamation</a>
        <div class="cards-container">
            @foreach ($reclamations as $reclamation)
                @if ($reclamation->eleve->parent_id == $parent->id)
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">{{ $reclamation->titre }} </h5>
                            <h4 class="card-text">A propos l'eleve: {{ $reclamation->eleve->name }}</h4>
                            <p>{{ substr($reclamation->details, '0', '50') . '...' }}</p>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-end g-2">

                            <a href="parent_reclamations/{{ $reclamation->id }}"
                                class="btn btn-outline-secondary mx-1">Afficher</a>

                        </div>

                        <div class="card-footer text-center text-muted">Crée le:
                            {{ date('Y-m-d', strtotime($reclamation->created_at)) }}
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection
