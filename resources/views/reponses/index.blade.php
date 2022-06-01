@extends('layouts.appAdmin')

@section('content')
    <div class="mt-5 container-lg">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{ route('reponses') }}/create" class="btn btn-primary mb-2">Aouter Reponse</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Eleve</th>
                            <th>Home Work</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reponses as $reponse)
                            <tr>
                                <td>{{ $reponse->id }}</td>
                                <td>
                                    <img src="{{ url($reponse->photo) }}" height="50px">
                                </td>
                                <td>{{ $reponse->eleve->name }}</td>
                                <td>{{ $reponse->homeWork->name }}</td>
                                <td>{{ date('Y-m-d', strtotime($reponse->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">
                                    <a href="{{ route('reponses') }}/{{ $reponse->id }}"
                                        class="btn btn-outline-secondary">Afficher</a>
                                    <a href="{{ route('reponses') }}/{{ $reponse->id }}/edit"
                                        class="btn btn-primary">Modifier</a>
                                    <form action="reponses/{{ $reponse->id }}" method="post" class="d-inline">
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
