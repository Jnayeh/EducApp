@extends('layouts.appUser')

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

                        <form action="/homeworks_prof/{{ $home_work->id }}" enctype="multipart/form-data" method="post">
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


                            <input type="hidden" name="professeur_id" value="{{ $home_work->professeur_id }}">

                            @if ($errors->has('professeur_id'))
                                <span class="text-danger m-2">{{ $errors->first('professeur_id') }}</span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2 w-100">Modifier</button>
                        </form>

                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('prof_homeworks') }}" class="btn btn-outline-primary m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
