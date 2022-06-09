@extends('layouts.appUser')

@section('content')
    <div class="container mt-5">
        <script>
            function fileChange(e) {
                let img = document.getElementById('img');
                img.href = window.URL.createObjectURL(e.target.files[0]);
                document.getElementById('img-holder').className = "m-2 d-flex justify-content-center";
            }
        </script>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Affichage Homework') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2 class="font-h2"><strong>Nom du professeur:</strong> </h2>
                        <h3 class="font-monospace text-center ">
                            {{ $home_work->professeur->name . ' ' . $home_work->professeur->firstname }}</h3>
                        <p class="font-monospace text-center "> {{ $home_work->description ?? '' }}</p>

                        <div class="m-2 d-flex justify-content-center">
                            @if (Str::endsWith($home_work->photo, 'pdf') | Str::endsWith($home_work->photo, 'doc') | Str::endsWith($home_work->photo, 'docx'))
                                <img src="{{ url('doc.jpg') }}" class="card-img-top card-image " alt="document"
                                    width="300px">
                            @else
                                <img src="{{ url($home_work->photo) }}" class="card-img-top card-image " alt="photo"
                                    width="300px">
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href=" {{ route('parent_homeworks') }}" class="btn btn-outline-secondary m-2">Retour</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ $reponse ? 'Modifier' : 'Ajouter' }} votre Reponse</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($reponse)
                            <form action="/reponses_eleve/{{ $reponse->id }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Document </label>
                                    <input type="file" name="photo" value="{{ $reponse->photo }}"
                                        accept=".jpeg,.png,.jpg,.gif,.pdf,.doc,.docx" class="form-control"
                                        onchange="document.getElementById('output').href = window.URL.createObjectURL(this.files[0])">
                                    @error('photo')
                                        <div class="text-danger m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="m-2 d-flex justify-content-center">
                                    <a id="output" href="{{ url($reponse->photo) }}" target="_blank"><i
                                            class='bx bx-link-external'></i></a>

                                </div>

                                <input type="hidden" name="eleve_id" value="{{ $eleve->id }}">

                                @if ($errors->has('eleve_id'))
                                    <span class="text-danger m-2">{{ $errors->first('eleve_id') }}</span>
                                @endif

                                <input type="hidden" name="home_work_id" value="{{ $home_work->id }}">

                                @if ($errors->has('homee_work_id'))
                                    <span class="text-danger m-2">{{ $errors->first('homee_work_id') }}</span>
                                @endif

                                <button type="submit" class="btn btn-primary mt-2 w-100">Modifier</button>
                            </form>
                        @else
                            <form action="/reponses_eleve" enctype="multipart/form-data" method="post">
                                @csrf

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

                                <input type="hidden" name="eleve_id" value="{{ $eleve->id }}">

                                @if ($errors->has('eleve_id'))
                                    <span class="text-danger m-2">{{ $errors->first('eleve_id') }}</span>
                                @endif

                                <input type="hidden" name="home_work_id" value="{{ $home_work->id }}">

                                @if ($errors->has('home_work_id'))
                                    <span class="text-danger m-2">{{ $errors->first('home_work_id') }}</span>
                                @endif

                                <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter</button>
                            </form>
                        @endif


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
