@extends('layouts.appAdmin')

@section('content')
    <div class="mt-5 container-lg">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="parents/create" class="btn btn-primary mb-2">Aouter parent</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parents as $parent)
                            <tr>
                                <td>{{ $parent->id }}</td>
                                <td>{{ $parent->name }}</td>
                                <td>{{ $parent->email }}</td>
                                <td>{{ $parent->telephone }}</td>
                                <td>{{ date('Y-m-d', strtotime($parent->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">
                                    <a href="parents/{{ $parent->id }}" class="btn btn-outline-secondary">Afficher</a>
                                    <a href="parents/{{ $parent->id }}/edit" class="btn btn-primary">Modifier</a>
                                    <form action="parents/{{ $parent->id }}" method="post" class="d-inline">
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
