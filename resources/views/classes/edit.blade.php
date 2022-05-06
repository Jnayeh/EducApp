@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modification classe') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/classes/{{ $classe->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nom </label>
                                <input type="text" name="nom" value="{{ $classe->nom }}" class="form-control">
                                @if ($errors->has('nom'))
                                    <span class="text-danger m-2">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Niveau</label>
                                <input type="number" value="{{ $classe->niveau }}" min=1 name="niveau"
                                    class="form-control">
                                @if ($errors->has('niveau'))
                                    <span class="text-danger m-2">{{ $errors->first('niveau') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Emploi d'eleves </label>
                                <input type="file" name="emploi_elv" value="{{ $classe->emploi_elv }}"
                                    class="form-control"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="m-2 d-flex justify-content-center">
                                <img id="output" src="{{ url($classe->emploi_elv) }}" height="100px">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Modifier</button>
                        </form>

                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('classes') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
