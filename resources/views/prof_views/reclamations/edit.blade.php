@extends('layouts.appUser')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modification Reclamation') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/reclamations_prof/{{ $reclamation->id }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group m-2">
                                <label for="">Titre </label>
                                <input type="text" name="titre" class="form-control" value="{{ $reclamation->titre }}">
                                @if ($errors->has('titre'))
                                    <span class="text-danger m-2">{{ $errors->first('titre') }}</span>
                                @endif
                            </div>

                            <div class="form-group m-2">
                                <label for="">Details </label>
                                <textarea name="details" class="form-control" rows="4">{{ $reclamation->details }}</textarea>
                                @if ($errors->has('details'))
                                    <span class="text-danger m-2">{{ $errors->first('details') }}</span>
                                @endif
                            </div>

                            <input type="hidden" name="professeur_id" value="{{ $reclamation->professeur_id }}">
                            <input type="hidden" name="to" value="{{ $reclamation->to }}">

                            @if ($errors->has('professeur_id'))
                                <span class="text-danger m-2">{{ $errors->first('professeur_id') }}</span>
                            @endif

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Eleve</label>
                                </div>
                                <select class="custom-select" name="eleve_id">
                                    @foreach ($eleves as $eleve)
                                        <option value="{{ $eleve->id }}"
                                            {{ $eleve->id == $reclamation->eleve_id ? 'selected' : '' }}>
                                            {{ $eleve->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('eleve_id'))
                                <span class="text-danger m-2">{{ $errors->first('eleve_id') }}</span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2 w-100">Modifier</button>
                        </form>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href=" {{ route('prof_reclamations') }}" class="btn btn-outline-secondary m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
