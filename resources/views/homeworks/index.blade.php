@extends('layouts.appAdmin')

@section('content')
    <div class="mt-5 container-lg">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="home_works/create" class="btn btn-primary mb-2">Aouter Homework</a>
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
                        @foreach ($home_works as $home_work)
                            <tr>
                                <td>{{ $home_work->id }}</td>
                                <td>
                                    <img src="{{ url($home_work->photo) }}" height="50px">
                                </td>
                                <td>{{ $home_work->professeur->name }}</td>
                                <td>{{ date('Y-m-d', strtotime($home_work->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">
                                    <a href="home_works/{{ $home_work->id }}"
                                        class="btn btn-outline-secondary">Afficher</a>
                                    <a href="home_works/{{ $home_work->id }}/edit" class="btn btn-primary">Modifier</a>
                                    <form action="home_works/{{ $home_work->id }}" method="post" class="d-inline">
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
