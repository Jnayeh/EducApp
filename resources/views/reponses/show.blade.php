@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Affichage Reponse') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2 class="font-h2"><strong>Nom d' eleve:</strong> </h2>
                        <h3 class="font-monospace text-center "> {{ $reponse->eleve->name }}</h3>

                        <div class="m-2 d-flex justify-content-center">
                            <img src="{{ url($reponse->photo) }}" width="300px">
                        </div>

                    </div>
                    <div class="d-flex justify-content-end">

                        <a href=" {{ route('reponses') }}" class="btn btn-outline-dark m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
