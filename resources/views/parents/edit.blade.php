@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modification parent') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/parents/{{ $parent->id }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="">Nom </label>
                                    <input type="text" name="name" value="{{ $parent->name }}" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="text-danger mt-2">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Prénom </label>
                                    <input type="text" name="firstname" value="{{ $parent->firstname }}"
                                        class="form-control">
                                    @if ($errors->has('firstname'))
                                        <span class="text-danger mt-2">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Email</label>
                                <input type="email" value="{{ $parent->email }}" name="email" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="text-danger mt-2">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="text-danger mt-2">{{ $errors->first('password') }}</span>
                                @endif

                            </div>

                            <div class="d-flex m-2 mt-3">
                                <label for="password-confirm"
                                    class="col-md-4 p-2 col-form-label ">{{ __('Confirm Password') }}</label>

                                <div class="flex-grow-1 flex-shrink-1">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Telephone</label>
                                <input type="number" value="{{ $parent->telephone }}" min=0 name="telephone"
                                    class="form-control">
                                @if ($errors->has('telephone'))
                                    <span class="text-danger mt-2">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Modifier</button>
                        </form>

                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('parents') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
