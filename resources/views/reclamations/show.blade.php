@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-h1">{{ __('Affichage Reclamation') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <h3 class="font-h2"><strong>Nom d'éleve:</strong> </h3>
                        <h4 class="font-monospace mx-4"> {{ $reclamation->eleve->name }}</h4>
                        <h3 class="font-h2"><strong>Nom du professeur:</strong> </h3>
                        <h4 class="font-monospace mx-4"> {{ $reclamation->professeur->name }}</h4>

                        <div class="d-flex">
                            <h4 class="font-h4"><strong>Titre:</strong> </h4>
                            <h5 class="font-monospace mx-2"> {{ $reclamation->titre }}</h5>
                        </div>
                        <h4 class="font-h4"><strong>Détails:</strong> </h4>
                        <h5 class="font-monospace mx-5"> {{ $reclamation->details }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
