@extends('layouts.appAdmin')

@section('content')
    <div class="mt-5 container-lg">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="emplois_prof/create" class="btn btn-primary mb-2">Aouter Emploi</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Professeur</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emplois as $emploi)
                            <tr>
                                <td>{{ $emploi->id }}</td>
                                <td>
                                    <img src="{{ url($emploi->photo) }}" height="50px">
                                </td>
                                <td>{{ $emploi->professeur->name }}</td>
                                <td>{{ date('Y-m-d', strtotime($emploi->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">
                                    <a href="emplois_prof/{{ $emploi->id }}" class="btn btn-outline-secondary">Afficher</a>
                                    <a href="emplois_prof/{{ $emploi->id }}/edit" class="btn btn-primary">Modifier</a>
                                    <form action="emplois_prof/{{ $emploi->id }}" method="post" class="d-inline">
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
