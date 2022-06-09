@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Affichage classe') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2 class="font-h2"><strong>Classe:</strong> {{ $classe->nom }}</h2>

                        <p><strong>Niveau:</strong> {{ $classe->niveau }}</p>

                        @if ($classe->emploi_elv)
                            <div class="m-2 d-flex justify-content-center">
                                <a href="{{ url($classe->emploi_elv) }}" target="_blank"><i
                                        class='bx bx-link-external'></i></a>
                            </div>
                        @else
                            <div class="m-2 d-flex justify-content-center">
                                <img src="{{ url('placeholder.png') }}" width="300px">
                            </div>
                            <div class="text-center">
                                <i>Ajouter un emploi</i>
                            </div>
                        @endif


                    </div>
                    <div class="d-flex justify-content-end">

                        <a href=" {{ route('classes') }}" class="btn btn-outline-dark m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
