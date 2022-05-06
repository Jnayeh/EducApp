@extends('layouts.appAdmin')

@section('content')
    <div class="m-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="eleves/create" class="btn btn-primary mb-2">Aouter eleve</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Parent</th>
                            <th>Classe</th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eleves as $eleve)
                            <tr>
                                <td>{{ $eleve->id }}</td>
                                <td>{{ $eleve->name }}</td>
                                <td>{{ $eleve->email }}</td>
                                <td>{{ $eleve->telephone }}</td>
                                <td>
                                    @if($eleve->parent)
                                        {{ $eleve->parent->name }}
                                    @else
                                        <i>Affecter un parent</i>
                                    @endif
                                    </td>
                                <td>
                                    @if($eleve->classe )
                                        {{ $eleve->classe->nom  }}
                                    @else
                                        <i>Affecter au classe</i>
                                    @endif
                                </td></td>
                                <td>{{ date('Y-m-d', strtotime($eleve->created_at)) }}</td>
                                <td class="d-flex justify-content-center gap-md-2">
                                    <a href="eleves/{{ $eleve->id }}" class="btn btn-outline-secondary">Afficher</a>
                                    <a href="eleves/{{ $eleve->id }}/edit" class="btn btn-primary">Modifier</a>
                                    <form action="eleves/{{ $eleve->id }}" method="post" class="d-inline">
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
