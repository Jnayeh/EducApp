@extends('layouts.appAdmin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajout Reclamation') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/reclamations" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group m-2">
                                <label for="">Titre </label>
                                <input type="text" value="{{ old('titre') }}" name="titre" class="form-control">
                                @if ($errors->has('titre'))
                                    <span class="text-danger m-2">{{ $errors->first('titre') }}</span>
                                @endif
                            </div>

                            <div class="form-group m-2">
                                <label for="">Details </label>
                                <textarea value="{{ old('details') }}" name="details" class="form-control" rows="4"
                                    placeholder="Les details sur la eclamations svp!!"></textarea>
                                @if ($errors->has('details'))
                                    <span class="text-danger m-2">{{ $errors->first('details') }}</span>
                                @endif
                            </div>

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Eleve</label>
                                </div>

                                <select class="custom-select" name="eleve_id">
                                    <option value="">Choisir...</option>
                                    @foreach ($eleves as $eleve)
                                        <option value="{{ $eleve->id }}">
                                            {{ $eleve->name . ' ' . $eleve->firstname }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('eleve_id'))
                                <span class="text-danger m-2">{{ $errors->first('eleve_id') }}</span>
                            @endif

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Professeur</label>
                                </div>

                                <select class="custom-select" name="professeur_id">
                                    <option value="">Choisir...</option>
                                    @foreach ($professeurs as $professeur)
                                        <option value="{{ $professeur->id }}">
                                            {{ $professeur->name . ' ' . $professeur->firstname }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('professeur_id'))
                                <span class="text-danger m-2">{{ $errors->first('professeur_id') }}</span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('reclamations') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
