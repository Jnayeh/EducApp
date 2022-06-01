@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <div class="cards-container">

            @foreach ($bulletins as $bulletin)
                @if ($bulletin->eleve->parent->id == $parent->id)
                    <div class="card ">
                        <img src="{{ url($bulletin->bulletin) }}" class="card-img-top card-image " alt="photo">
                        <div class="card-body">
                            <h5 class="card-title">Bulletin de notes d'eleve: {{ $bulletin->eleve->name }} </h5>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-end g-2">
                            <a href="{{ url($bulletin->bulletin) }}" target="blank"
                                class="btn btn-outline-primary mx-1">Afficher</a>
                        </div>

                        <div class="card-footer text-center text-muted">Crée le:
                            {{ date('Y-m-d', strtotime($bulletin->created_at)) }}
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection
