@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Affichage eleve') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2 class="font-h2"><strong>Nom:</strong> </h2>
                        <h3 class="font-monospace text-center "> {{ $eleve->name }}</h3>

                        <p><strong>Email:</strong> {{ $eleve->email ?? "N'a pas d'email" }}</p>
                        <p><strong>Telephone:</strong> {{ $eleve->telephone ?? "N'a pas du numero telephone" }}</p>
                        <p><strong>Classe:</strong>
                            @if ($eleve->classe)
                                {{ $eleve->classe->nom }}
                            @else
                                <i>Affecter au classe</i>
                            @endif
                        </p>
                        <p><strong>Parent:</strong>
                            @if ($eleve->parent)
                                {{ $eleve->parent->name . ' ' . $eleve->parent->firstname }}
                            @else
                                <i>Affecter un parent</i>
                            @endif
                        </p>

                    </div>
                    <div class="d-flex justify-content-end">

                        <a href=" {{ route('eleves') }}" class="btn btn-outline-dark m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
