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
                    <div class="card-header">{{ __('Ajout Reponse') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/reponses" enctype="multipart/form-data" method="post">
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
                                    <label class="input-group-text" for="">Eleve</label>
                                </div>

                                <select class="custom-select" name="eleve_id">
                                    <option value="">Choisir...</option>
                                    @foreach ($eleves as $eleve)
                                        <option value="{{ $eleve->id }}">
                                            {{ $eleve->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('eleve_id'))
                                <span class="text-danger m-2">{{ $errors->first('eleve_id') }}</span>
                            @endif

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Home Work</label>
                                </div>

                                <select class="custom-select" name="home_work_id">
                                    <option value="">Choisir...</option>
                                    @foreach ($homeWorks as $homeWork)
                                        <option value="{{ $homeWork->id }}">
                                            {{ $homeWork->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('home_work_id'))
                                <span class="text-danger m-2">{{ $errors->first('home_work_id') }}</span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('reponses') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
