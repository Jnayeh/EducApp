@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Affichage professeur') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2 class="font-h2"><strong>Nom:</strong> </h2>
                        <h3 class="font-monospace text-center "> {{ $professeur->name }}</h3>

                        <p><strong>Email:</strong> {{ $professeur->email }}</p>
                        <p><strong>Telephone:</strong> {{ $professeur->telephone }}</p>
                        <p><strong>Matiere:</strong> {{ $professeur->matiere->nom }}</p>

                    </div>
                    <div class="d-flex justify-content-end">

                        <a href=" {{ route('professeurs') }}" class="btn btn-outline-dark m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
