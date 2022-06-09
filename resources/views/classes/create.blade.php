@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <script>
            function fileChange(e) {
                let img = document.getElementById('img');
                img.src = window.URL.createObjectURL(e.target.files[0]);
                document.getElementById('img-holder').className = "m-2 d-flex justify-content-center";
            }
        </script>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajout classe') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/classes" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group m-2">
                                <label for="">Nom </label>
                                <input type="text" value="{{ old('nom') }}" name="nom" class="form-control">
                                @if ($errors->has('nom'))
                                    <span class="text-danger m-2">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>

                            <div class="form-group m-2">
                                <label for="">Niveau</label>
                                <input type="number" min=1 value="{{ old('niveau') }}" name="niveau"
                                    class="form-control">
                                @if ($errors->has('niveau'))
                                    <span class="text-danger m-2">{{ $errors->first('niveau') }}</span>
                                @endif
                            </div>

                            <div class="form-group m-2">
                                <label for="">Emploi d'eleves</label>
                                <input type="file" min=0 step="0.01" name="emploi_elv" class="form-control"
                                    accept=".jpeg,.png,.jpg,.gif,.pdf,.doc,.docx" onchange="fileChange(event)">
                                @error('emploi_elv')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="img-holder" class="d-none">
                                <img src="" id="img" height="100px">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter</button>
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
