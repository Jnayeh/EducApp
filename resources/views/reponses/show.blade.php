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
                            <a href="{{ url($reponse->photo) }}" target="_blank"><i class='bx bx-link-external'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
