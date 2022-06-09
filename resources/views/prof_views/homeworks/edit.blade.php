@extends('layouts.appUser')

@section('content')
    <div class="container mt-5">
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

                            <div class="form-group m-2">
                                <label for="">Pour les classes: </label>
                                @foreach ($prof->classes as $classe)
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

                            <div class="form-group m-2">
                                <label for="">Document </label>
                                <input type="file" name="photo" value="{{ $home_work->photo }}" class="form-control"
                                    accept=".jpeg,.png,.jpg,.gif,.pdf,.doc,.docx"
                                    onchange="document.getElementById('output').href = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="m-2 d-flex justify-content-center">
                                <a id="output" href="{{ url($reponse->photo) }}" target="_blank"><i
                                        class='bx bx-link-external'></i></a>
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
