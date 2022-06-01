@extends('layouts.appAdmin')

@section('content')
    <div class="mt-5 container-lg">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="matieres/create" class="btn btn-primary mb-2">Aouter Matiere</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Coefficient</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matieres as $matiere)
                            <tr>
                                <td>{{ $matiere->id }}</td>
                                <td>{{ $matiere->nom }}</td>
                                <td>{{ $matiere->coefficient }}</td>
                                <td>{{ date('Y-m-d', strtotime($matiere->created_at)) }}</td>
                                <td class="d-flex justify-content-center  gap-md-2">
                                    <a href="matieres/{{ $matiere->id }}" class="btn btn-outline-secondary">Afficher</a>
                                    <a href="matieres/{{ $matiere->id }}/edit" class="btn btn-primary">Modifier</a>
                                    <form action="matieres/{{ $matiere->id }}" method="post" class="d-inline">
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
