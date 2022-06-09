@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <div class="cards-container">

            @foreach ($home_works as $home_work)
                <div class="card ">
                    @if (Str::endsWith($home_work->photo, 'pdf') | Str::endsWith($home_work->photo, 'doc') | Str::endsWith($home_work->photo, 'docx'))
                        <img src="{{ url('doc.jpg') }}" class="card-img-top card-image " alt="document">
                    @else
                        <img src="{{ url($home_work->photo) }}" class="card-img-top card-image " alt="photo">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Homework de
                            {{ $home_work->professeur_name . ' ' . $home_work->professeur_firstname }} </h5>
                        <p class="card-text">Pour l'eleve:
                            {{ $home_work->eleve_name . ' ' . $home_work->eleve_firstname }}</p>
                        <p class="card-text">A propos la matiere: {{ $home_work->professeur_matiere_nom }}
                        </p>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-end g-2">
                        <div>
                            <a href="parent_homeworks/{{ $home_work->id }}/eleve/{{ $home_work->eleve_id }}"
                                class="btn btn-outline-secondary mx-1">Votre réponse</a>
                            <a href="/download/{{ $home_work->photo }}" target="blank"
                                class="btn btn-outline-primary mx-1">Telecharger</a>
                        </div>
                    </div>

                    <div class="card-footer text-center text-muted">Crée le:
                        {{ date('d-m-Y', strtotime($home_work->created_at)) }}
                    </div>
                </div>
            @endforeach

            @if (count($home_works) == 0)
                <div class='d-flex flex-column justify-content-center' style='height:300px;margin:0px'>
                    <h1 style='max-width:70vw; margin: auto; text-align:center'>Il y'a aucun homework</h1>
                </div>
            @endif

        </div>
    </div>
@endsection
