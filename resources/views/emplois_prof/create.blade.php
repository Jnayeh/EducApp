@extends('layouts.appAdmin')

@section('content')
    <script>
        function fileChange(e) {
            let img = document.getElementById('img');
            img.src = window.URL.createObjectURL(e.target.files[0]);
            document.getElementById('img-holder').className = "m-2 d-flex justify-content-center";
        }
    </script>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajout emploi') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/emplois_prof" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group m-2">
                                <label for="">Photo</label>
                                <input type="file" min=0 step="0.01" name="photo" class="form-control"
                                    onchange="fileChange(event)">
                                @error('photo')
                                    <div class="text-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="img-holder" class="d-none">
                                <img src="" id="img" height="100px">
                            </div>

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">professeur</label>
                                </div>

                                <select class="custom-select" name="professeur_id">
                                    <option value="">Choisir...</option>
                                    @foreach ($professeurs as $professeur)
                                        <option value="{{ $professeur->id }}">
                                            {{ $professeur->name }}</option>
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

                    <a href=" {{ route('emplois_prof') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
