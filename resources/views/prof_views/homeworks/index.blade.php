@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <a href="homeworks_prof/create" class="btn btn-primary mb-2">Aouter Homework</a>
        <div class="cards-container">

            @foreach ($home_works as $home_work)
                <div class="card ">
                    @if (Str::endsWith($home_work->photo, 'pdf') | Str::endsWith($home_work->photo, 'doc') | Str::endsWith($home_work->photo, 'docx'))
                        <img src="{{ url('doc.jpg') }}" class="card-img-top card-image " alt="document">
                    @else
                        <img src="{{ url($home_work->photo) }}" class="card-img-top card-image " alt="photo">
                    @endif
                    <div class="card-body">

                        Pour les classes: <p class="card-text d-flex justify-content-space-around">
                            @foreach ($home_work->classes as $classe)
                                <span class="chip m-1">
                                    {{ $classe->nom }}
                                </span>
                            @endforeach
                        </p>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-end g-2">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <a href="prof_homeworks/{{ $home_work->id }}" class="btn btn-secondary m-1">
                                Réponses</a>
                            <a href="/download/{{ $home_work->photo }}" target="blank"
                                class="btn btn-outline-primary m-1">Telecharger</a>
                            <a href="homeworks_prof/{{ $home_work->id }}/edit"
                                class="btn btn-outline-warning m-1">Modifier</a>
                        </div>
                    </div>

                    <div class="card-footer text-center text-muted">Ajouté le:
                        {{ date('d-m-Y', strtotime($home_work->created_at)) }}
                    </div>
                </div>
            @endforeach
            @if (count($home_works) == 0)
                <div class='d-flex flex-column justify-content-center' style='height:300px;margin:0px'>
                    <h1 style='max-width:70vw; margin: auto; text-align:center'>Vous n'avez pas ajouté aucun homework</h1>
                </div>
            @endif
        </div>
    </div>
@endsection
