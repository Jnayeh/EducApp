@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modification Reponse') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/reponses/{{ $reponse->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Document </label>
                                <input type="file" name="photo" value="{{ $reponse->photo }}"
                                    accept=".jpeg,.png,.jpg,.gif,.pdf,.doc,.docx" class="form-control"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                @error('photo')
                                    <div class="text-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="m-2 d-flex justify-content-center">
                                <img id="output" src="{{ url($reponse->photo) }}" height="100px">
                            </div>

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Eleve</label>
                                </div>
                                <select class="custom-select" name="eleve_id">
                                    @foreach ($eleves as $eleve)
                                        <option value="{{ $eleve->id }}"
                                            {{ $eleve->id == $reponse->eleve_id ? 'selected' : '' }}>
                                            {{ $eleve->name . ' ' . $eleve->firstname }}</option>
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
                                <select class="custom-select" name="homee_work_id">
                                    @foreach ($homeWorks as $homeWork)
                                        <option value="{{ $homeWork->id }}"
                                            {{ $homeWork->id == $reponse->home_work_id ? 'selected' : '' }}>
                                            {{ $homeWork->id }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('homee_work_id'))
                                <span class="text-danger m-2">{{ $errors->first('homee_work_id') }}</span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2">Modifier</button>
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
