@extends('layouts.appAdmin')

@section('content')
    <div class="mt-5 container-lg">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{ route('reclamations') }}/create" class="btn btn-primary mb-2">Aouter Reclamation</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Details</th>
                            <th>Eleve</th>
                            <th>Professeur</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reclamations as $reclamation)
                            <tr>
                                <td>{{ $reclamation->id }}</td>
                                <td>{{ $reclamation->titre }}</td>
                                <td>{{ substr($reclamation->details, '0', '50') . '...' }}</td>
                                <td>{{ $reclamation->eleve->name . ' ' . $reclamation->eleve->firstname }}</td>
                                <td>{{ $reclamation->professeur->name . ' ' . $reclamation->professeur->firstname }}</td>
                                <td>{{ date('Y-m-d', strtotime($reclamation->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">
                                    <a href="{{ route('reclamations') }}/{{ $reclamation->id }}"
                                        class="btn btn-outline-secondary">Afficher</a>
                                    <a href="{{ route('reclamations') }}/{{ $reclamation->id }}/edit"
                                        class="btn btn-primary">Modifier</a>
                                    <form action="reclamations/{{ $reclamation->id }}" method="post"
                                        class="d-inline">
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
