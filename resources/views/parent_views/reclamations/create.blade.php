@extends('layouts.appUser')

@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajout Reclamation') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/reclamations_parent" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group m-2">
                                <label for="">Titre </label>
                                <input type="text" name="titre" class="form-control">
                                @if ($errors->has('titre'))
                                    <span class="text-danger m-2">{{ $errors->first('titre') }}</span>
                                @endif
                            </div>

                            <div class="form-group m-2">
                                <label for="">Details </label>
                                <textarea name="details" class="form-control" rows="4" placeholder="Les details sur la eclamations svp!!"></textarea>
                                @if ($errors->has('details'))
                                    <span class="text-danger m-2">{{ $errors->first('details') }}</span>
                                @endif
                            </div>

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Eleve</label>
                                </div>

                                <select class="custom-select" id="eleve" name="eleve_id" onchange="">
                                    <option value="">Choisir...</option>
                                    @foreach ($eleves as $eleve)
                                        <option value="{{ $eleve->id }}">
                                            {{ $eleve->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('eleve_id'))
                                <span class="text-danger m-2">{{ $errors->first('eleve_id') }}</span>
                            @endif

                            <input type="hidden" name="to" value="professeur">

                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Professeur</label>
                                </div>

                                <select class="custom-select" id="prof_list" name="professeur_id">
                                    <option value="">Choisir...</option>

                                    <script>
                                        $(document).on('change', '#eleve', function() {
                                            var eleve_id = $(this).val();
                                            $.ajax({
                                                type: 'GET',
                                                url: "{{ route('professeurs_by_eleve') }}",
                                                data: {
                                                    'eleve_id': eleve_id
                                                },
                                                success: function(data) {
                                                    document.getElementById("prof_list").innerHTML =
                                                        '<option value="">Choisir...</option>';
                                                    $.each(data, function(i, professeur) {
                                                        let node = document.createElement("option");
                                                        node.setAttribute("value", professeur.id);
                                                        let textnode = document.createTextNode(professeur.name);
                                                        node.appendChild(textnode);
                                                        document.getElementById("prof_list").appendChild(node);
                                                    });
                                                }
                                            });
                                        });
                                    </script>



                                </select>
                            </div>
                            @if ($errors->has('professeur_id'))
                                <span class="text-danger m-2">{{ $errors->first('professeur_id') }}</span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-end">

                    <a href=" {{ route('parent_reclamations') }}" class="btn btn-outline-dark m-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
