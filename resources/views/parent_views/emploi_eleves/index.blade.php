@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <div class="cards-container">

            @foreach ($eleves as $eleve)
                <div class="card ">
                    @if (Str::endsWith($eleve->classe->emploi_elv, 'pdf') | Str::endsWith($eleve->classe->emploi_elv, 'doc') | Str::endsWith($eleve->classe->emploi_elv, 'docx'))
                        <img src="{{ url('doc.jpg') }}" class="card-img-top card-image " alt="document">
                    @else
                        <img src="{{ url($eleve->classe->emploi_elv) }}" class="card-img-top card-image " alt="photo">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">Emploi d'eleve: {{ $eleve->name . ' ' . $eleve->firstname }} </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Classe: {{ $eleve->classe->nom }} </h6>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-end g-2">
                        <a href="/download/{{ $eleve->classe->emploi_elv }}" target="blank"
                            class="btn btn-outline-primary mx-1">Télecharger</a>
                    </div>

                    <div class="card-footer text-center text-muted">Ajouté le:
                        {{ date('d-m-Y', strtotime($eleve->classe->created_at)) }}
                    </div>
                </div>
            @endforeach
            @if (count($eleves) == 0)
                <div class='d-flex flex-column justify-content-center' style='height:300px;margin:0px'>
                    <h1 style='max-width:70vw; margin: auto; text-align:center'>Il y'a aucun emploi</h1>
                </div>
            @endif

        </div>
    </div>
@endsection
