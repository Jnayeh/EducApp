@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Affichage Matiere') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2 class="font-h2">Nom du matiére: </h2>
                        <h3 class=" text-center"> {{ $matiere->nom }}</h3>

                        <p>Coefficient: {{ $matiere->coefficient }}</p>

                    </div>
                    <div class="d-flex justify-content-end">

                        <a href=" {{ route('matieres') }}" class="btn btn-outline-dark m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
