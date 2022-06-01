@extends('layouts.appUser')

@section('content')
    <div class="container mt-5">
        <script>
            function fileChange(e) {
                let img = document.getElementById('img');
                img.src = window.URL.createObjectURL(e.target.files[0]);
                document.getElementById('img-holder').className = "m-2 d-flex justify-content-center";
            }
        </script>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Affichage Homework') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="m-2 d-flex justify-content-center">
                            <img src="{{ url($home_work->photo) }}" width="300px">
                        </div>
                        @foreach ($home_work->professeur->classes as $classe)
                            <h3 class="mt-4">Classe: {{ $classe->nom }}</h3>
                            @foreach ($eleves as $eleve)
                                @if ($classe->id == $eleve->classe_id)
                                    <div class="chip ">
                                        {{ $eleve->name }}
                                    </div>
                                @endif
                            @endforeach
                        @endforeach

                        <div class="cards-container">

                            @foreach ($home_work->reponses as $reponse)
                                <div class="card ">
                                    <img src="{{ url($reponse->photo) }}" class="card-img-top card-image " alt="photo">
                                    <div class="card-body">

                                        <p class="card-text ">
                                            Reponse d'eleve: <span>{{ $reponse->eleve->name }}</span>
                                        </p>
                                    </div>

                                    <div class="card-body d-flex flex-column justify-content-end g-2">
                                        <div>
                                            <a href="{{ url($reponse->photo) }}" target="blank"
                                                class="btn btn-outline-primary mx-1">Afficher</a>

                                        </div>
                                    </div>

                                    <div class="card-footer text-center text-muted">Crée le:
                                        {{ date('Y-m-d', strtotime($reponse->created_at)) }}
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div class="d-flex justify-content-end">
                        <a href=" {{ route('prof_homeworks') }}" class="btn btn-outline-secondary m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
