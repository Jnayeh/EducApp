@extends('layouts.appAdmin')

@section('content')
    <div class="mt-5 container-lg">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="professeurs/create" class="btn btn-primary mb-2">Aouter professeur</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Matiere</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($professeurs as $professeur)
                            <tr>
                                <td>{{ $professeur->id }}</td>
                                <td>{{ $professeur->name . ' ' . $professeur->firstname }}</td>
                                <td>{{ $professeur->email }}</td>
                                <td>{{ $professeur->telephone }}</td>
                                <td>{{ $professeur->matiere->nom }}</td>
                                <td>{{ date('Y-m-d', strtotime($professeur->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">

                                    <a href="professeurs/{{ $professeur->id }}"
                                        class="btn btn-outline-secondary">Afficher</a>

                                    <a href="professeurs/{{ $professeur->id }}/edit" class="btn btn-primary">Modifier</a>

                                    <form action="professeurs/{{ $professeur->id }}" method="post" class="d-inline">
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
