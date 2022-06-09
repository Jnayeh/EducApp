@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modification home_work') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/home_works/{{ $home_work->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Photo </label>
                                <input type="file" name="photo" value="{{ $home_work->photo }}" class="form-control"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="m-2 d-flex justify-content-center">
                                <img id="output" src="{{ url($home_work->photo) }}" height="100px">
                                @error('photo')
                                    <div class="text-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="form-group m-2">
                                <label for="">Description </label>
                                <input type="text" name="description" value="{{ $home_work->description ?? '' }}"
                                    class="form-control">
                                @if ($errors->has('description'))
                                    <span class="text-danger m-2">{{ $errors->first('description') }}</span>
                                @endif
                            </div> --}}

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">professeur</label>
                                </div>
                                <select class="custom-select" name="professeur_id">
                                    @foreach ($professeurs as $professeur)
                                        <option value="{{ $professeur->id }}"
                                            {{ $professeur->id == $home_work->professeur_id ? 'selected' : '' }}>
                                            {{ $professeur->name . ' ' . $professeur->firstname }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('professeur_id'))
                                <span class="text-danger m-2">{{ $errors->first('professeur_id') }}</span>
                            @endif

                            <div class="form-group m-2">
                                <label for="">Pour les classes: </label>
                                @foreach ($classes as $classe)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="classes[]"
                                            value="{{ $classe->id }}" id="{{ $classe->id }}"
                                            {{ $home_work->classes->contains($classe) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $classe->id }}">
                                            {{ $classe->nom . ' ' . $classe->niveau }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Modifier</button>
                        </form>

                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('home_works') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
