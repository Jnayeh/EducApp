@extends('layouts.appAdmin')

@section('content')
    <div class="mt-5 container-lg">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="bulletins/create" class="btn btn-primary mb-2">Aouter Bulletin</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Document</th>
                            <th>Eleve</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bulletins as $bulletin)
                            <tr>
                                <td>{{ $bulletin->id }}</td>
                                <td>
                                    @if (Str::endsWith($bulletin->bulletin, 'pdf') | Str::endsWith($bulletin->bulletin, 'doc') | Str::endsWith($bulletin->bulletin, 'docx'))
                                        <img src="{{ url('doc.jpg') }}" alt="document" height="30px">
                                    @else
                                        <img src="{{ url($bulletin->bulletin) }}" height="30px" alt="photo">
                                    @endif
                                </td>

                                <td>{{ $bulletin->eleve->name . ' ' . $bulletin->eleve->firstname }}</td>
                                <td>{{ date('Y-m-d', strtotime($bulletin->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">
                                    <a href="bulletins/{{ $bulletin->id }}" class="btn btn-outline-secondary">Afficher</a>
                                    <a href="bulletins/{{ $bulletin->id }}/edit" class="btn btn-primary">Modifier</a>
                                    <form action="bulletins/{{ $bulletin->id }}" method="post" class="d-inline">
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
