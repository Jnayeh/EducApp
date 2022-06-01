@extends('layouts.appUser')

@section('content')
    <div class="mt-5 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bienvenue') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Bienvenue au espace professeur!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
