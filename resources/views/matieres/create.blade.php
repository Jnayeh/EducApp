@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajout Matiere') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/matieres" method="post">
                            @csrf
                            <div class="form-group m-2">
                                <label for="">Nom </label>
                                <input type="text" name="nom" class="form-control">
                            </div>

                            <div class="form-group m-2">
                                <label for="">Coefficient</label>
                                <input type="number" min=0 step="0.5" name="coefficient" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('matieres') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
