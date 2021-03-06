@extends('layouts.appUser')

@section('content')
    <div class="container mt-5">

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
                        <h2 class="font-h2 text-center"><strong>{{ $reclamation->titre }}</strong> </h2>
                        <h4 class="font-monospace ">De parent:
                            {{ $reclamation->eleve->parent->name . ' ' . $reclamation->eleve->parent->firstname }}</h4>
                        <h4 class="font-monospace ">A propos:
                            {{ $reclamation->eleve->name . ' ' . $reclamation->eleve->firstname }} <br>
                            Affecté(e) au classe: {{ $reclamation->eleve->classe->nom }} </h4>
                        <p class="font-monospace m-3"> {{ $reclamation->details ?? '' }}</p>


                    </div>
                    <div class="d-flex justify-content-end">
                        <a href=" {{ route('prof_reclamations') }}" class="btn btn-outline-secondary m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
