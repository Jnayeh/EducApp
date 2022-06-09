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
                            <th>Document</th>
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
                                    @if (Str::endsWith($home_work->photo, 'pdf') | Str::endsWith($home_work->photo, 'doc') | Str::endsWith($home_work->photo, 'docx'))
                                        <img src="{{ url('doc.jpg') }}" alt="document" height="30px">
                                    @else
                                        <img src="{{ url($home_work->photo) }}" height="30px" alt="photo">
                                    @endif
                                </td>
                                <td>{{ $home_work->professeur->name . ' ' . $home_work->professeur->firstname }}</td>
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
