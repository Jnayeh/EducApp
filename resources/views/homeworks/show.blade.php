@extends('layouts.appAdmin')

@section('content')
    <div class="container">
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
                        <h2 class="font-h2"><strong>Nom du professeur:</strong> </h2>
                        <h3 class="font-monospace text-center ">
                            {{ $home_work->professeur->name . ' ' . $home_work->professeur->firstname }}</h3>
                        <div class="card-body">

                            Pour les classes: <p class="card-text d-flex justify-content-space-around">
                                @foreach ($home_work->classes as $classe)
                                    <span class="chip m-1">
                                        {{ $classe->nom }}
                                    </span>
                                @endforeach
                            </p>
                        </div>
                        <div class="m-2 d-flex justify-content-center">
                            <a href="{{ url($home_work->photo) }}" target="_blank"><i class='bx bx-link-external'></i></a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href=" {{ route('home_works') }}" class="btn btn-outline-dark m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
