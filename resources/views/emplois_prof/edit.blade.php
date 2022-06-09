@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modification emploi') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/emplois_prof/{{ $emploi->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Document </label>
                                <input type="file" name="photo" value="{{ $emploi->photo }}" class="form-control"
                                    accept=".jpeg,.png,.jpg,.gif,.pdf,.doc,.docx"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="m-2 d-flex justify-content-center">
                                <img id="output" src="{{ url($emploi->photo) }}" height="100px">
                            </div>

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Professeur</label>
                                </div>
                                <select class="custom-select" name="professeur_id">
                                    @foreach ($professeurs as $professeur)
                                        <option value="{{ $professeur->id }}"
                                            {{ $professeur->id == $emploi->professeur_id ? 'selected' : '' }}>
                                            {{ $professeur->name . ' ' . $professeur->firstname }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('professeur_id'))
                                <span class="text-danger m-2">{{ $errors->first('professeur_id') }}</span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2">Modifier</button>
                        </form>

                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('emplois_prof') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
