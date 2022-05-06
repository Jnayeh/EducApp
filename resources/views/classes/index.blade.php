@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="classes/create" class="btn btn-primary mb-2">Aouter classe</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Niveau</th>
                            <th>Emploi</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $classe)
                            <tr>
                                <td>{{ $classe->id }}</td>
                                <td>{{ $classe->nom }}</td>
                                <td>{{ $classe->niveau }}</td>
                                <td>
                                    @if($classe->emploi_elv)
                                        <img src="{{ url($classe->emploi_elv) }}" height="50px">
                                    @else
                                        <i>Ajouter un emploi</i>
                                    @endif
                                </td>
                                <td>{{ date('Y-m-d', strtotime($classe->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">
                                    <a href="classes/{{ $classe->id }}" class="btn btn-outline-secondary">Afficher</a>
                                    <a href="classes/{{ $classe->id }}/edit" class="btn btn-primary">Modifier</a>
                                    <form action="classes/{{ $classe->id }}" method="post" class="d-inline">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
