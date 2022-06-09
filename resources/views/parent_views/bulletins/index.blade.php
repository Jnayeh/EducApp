@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container-lg">
        <div class="cards-container">

            @foreach ($bulletins as $bulletin)
                @if ($bulletin->eleve->parent->id == $parent->id)
                    <div class="card ">
                        @if (Str::endsWith($bulletin->bulletin, 'pdf') | Str::endsWith($bulletin->bulletin, 'doc') | Str::endsWith($bulletin->bulletin, 'docx'))
                            <img src="{{ url('doc.jpg') }}" class="card-img-top card-image " alt="document">
                        @else
                            <img src="{{ url($bulletin->bulletin) }}" class="card-img-top card-image " alt="photo">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">Bulletin de notes d'eleve:
                                {{ $bulletin->eleve->name . ' ' . $bulletin->eleve->firstname }} </h5>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-end g-2">
                            <a href="/download/{{ $bulletin->bulletin }}" target="blank"
                                class="btn btn-outline-primary mx-1">Télecharger</a>
                        </div>

                        <div class="card-footer text-center text-muted">Crée le:
                            {{ date('d-m-Y', strtotime($bulletin->created_at)) }}
                        </div>
                    </div>
                @endif
            @endforeach
            @if (count($bulletins) == 0)
                <div class='d-flex flex-column justify-content-center' style='height:300px;margin:0px'>
                    <h1 style='max-width:70vw; margin: auto; text-align:center'>Il y'a aucun bulletin</h1>
                </div>
            @endif

        </div>
    </div>
@endsection
