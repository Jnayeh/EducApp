@extends('layouts.appUser')

@section('content')
    <script>
        function fileChange(e) {
            let img = document.getElementById('img');
            img.href = window.URL.createObjectURL(e.target.files[0]);
            document.getElementById('img-holder').className = "m-2 d-flex justify-content-center";
        }
    </script>
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajout homework') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/homeworks_prof" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group m-2">
                                <label for="">Pour les classes: </label>
                                @foreach ($prof->classes as $classe)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="classes[]"
                                            value="{{ $classe->id }}" id="{{ $classe->id }}">
                                        <label class="form-check-label" for="{{ $classe->id }}">
                                            {{ $classe->nom . ' niveau: ' . $classe->niveau }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group m-2">
                                <label for="">Document</label>
                                <input type="file" min=0 step="0.01" name="photo" class="form-control"
                                    accept=".jpeg,.png,.jpg,.gif,.pdf,.doc,.docx" onchange="fileChange(event)">
                                @error('photo')
                                    <div class="text-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="img-holder" class="d-none">
                                <a id="img" href="" target="_blank"><i class='bx bx-link-external'></i></a>
                            </div>

                            <input type="hidden" name="professeur_id" value="{{ $prof->id }}">

                            @if ($errors->has('professeur_id'))
                                <span class="text-danger m-2">{{ $errors->first('professeur_id') }}</span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter</button>
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
