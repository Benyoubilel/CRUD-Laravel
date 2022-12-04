@extends('template')
@section('titre')
    Les matiere
@endsection
@section('contenu')
    {{-- message errors --}}
    <div class="container-fluid p-4">
        <h1>
            Gestion des Matieres
        </h1>
        @if ($errors->any())
            <div class="alert alert-danger p-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success p-2">
                <p>
                    {{ \Session::get('success') }}
                </p>
            </div>
        @endif
        {{-- end message errors --}}

        <!-- Button trigger modal -->
        @auth
        <button type="button" class="btn btn-primary align-items-center pull-right m-2" data-bs-toggle="modal"
            data-bs-target="#addmodal">
            Ajouter <i class="fa fa-plus fa-x"></i>
        </button>

        <!-- editmodal -->
        <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addmodalLabel">Ajouter</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-floating" method="POST" action="/affMatieres/" id="editform">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="modal-body">
                            <label class="p-2">Code Matiere</label>
                            <input type="text" class="form-control" name="code_mat" id="val3"
                                placeholder="ALG" required>

                            <label class="p-2">Libelle</label>
                            <input type="text" class="form-control" name="libelle_mat" id="val3"
                                placeholder="Algorithme" required>

                            <label class="p-2">Coefficient</label>
                            <input type="text" class="form-control" name="coefficient_mat" id="val4" placeholder="2"
                                required>
                            <br>
                            <div class="modal-footer m-2">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-success" id="submit">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end editmodal --}}
    </div>
@endauth
    {{-- table info --}}
    <table class="table table-sm" id="datatable">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Code matiere
                </th>
                <th>
                    Libelle
                </th>
                <th>
                    Coefficient
                </th>
                @auth
                <th>
                    Modifier
                </th>
                <th>
                    supprimer
                </th>
                @endauth
            </tr>
        </thead>
        <tbody>
            {{-- show info fri-om database --}}
            @foreach ($matieres as $matiere)
                <tr>
                    <td>
                        {{ $matiere->id }}
                    </td>
                    <td>
                        {{ $matiere->code_mat }}
                    </td>
                    <td>
                        {{ $matiere->libelle_mat }}
                    </td>
                    <td>
                        {{ $matiere->coefficient_mat }}
                    </td>
                    @auth
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success align-items-center editbtn" data-bs-toggle="modal"
                            data-bs-target="#editmodal{{ $matiere->id }}" id="{{ $matiere->id }}">
                            <i class="fa fa-edit fa-x"></i>
                        </button>

                        <!-- editModal to update info-->
                        <div class="modal fade" id="editmodal{{ $matiere->id }}" tabindex="-1" aria-labelledby="editmodalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editmodalLabel">Modifier</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form class="form-floating" method="POST"
                                        action="/affMatieres/{{ $matiere->id }}" id="editform">
                                        {{-- security input --}}
                                        {{ csrf_field() }}
                                        {{-- method to update --}}
                                        {{ method_field('PUT') }}

                                        <div class="modal-body">
                                            <label class="p-2">ID</label>
                                            <input type="text" class="form-control" name="id" id="val1"
                                                value="{{ $matiere->id }}" disabled="disabled">

                                                <label class="p-2">Code matiere</label>
                                                <input type="text" class="form-control" name="code_mat" 
                                                    value="{{ $matiere->code_mat }}" >

                                            <label class="p-2">Libelle</label>
                                            <input type="text" class="form-control" name="libelle_mat" id="val2"
                                                value="{{ $matiere->libelle_mat }}" required>

                                            <label class="p-2">Coefficient</label>
                                            <input type="text" class="form-control" name="coefficient_mat"
                                                id="val3" value="{{ $matiere->coefficient_mat }}" required>
                                            <br>
                                            <div class="modal-footer m-2">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                              <button type="submit" class="btn btn-success"
                                                id="submit">Confirmer</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- end EditModal --}}

                    <td>
                        {{-- delete row from table --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#suppmodal{{ $matiere->id }}" id="{{ $matiere->id }}">
                            <i class="fa fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="suppmodal{{ $matiere->id }}" tabindex="-1" aria-labelledby="suppmodalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form class="form-floating" method="POST"
                                    action="/affMatieres/{{ $matiere->id }}" id="editform">
                                    {{-- security input --}}
                                    {{ csrf_field() }}
                                    {{-- method to update --}}
                                    {{ method_field('DELETE') }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="suppmodalLabel"> <i
                                                    class="fa fa-warning text-danger fa-2x"></i></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Tous les epreuves associées a cette matiere seront supprimé!!!
                                            voulez-vous supprimé cette matiere?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-outline-danger"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- end delete option --}}
                    </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
   
    {{-- end table info --}}
@endsection
@section('script')
    <script type="text/javascript">
        $(function() {

            var table = $('#datatable').DataTable({

            });

        });
    </script>
    @endsection