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

                        <form action="/emplois_elv/{{$emploi->id}}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Photo </label>
                                <input type="file" name="photo" value="{{ $emploi->photo }}" class="form-control" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="m-2 d-flex justify-content-center">
                                <img id="output" src="{{ url($emploi->photo) }}" height="100px" >
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Modifier</button>
                        </form>

                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{route('emplois_elv')}}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
