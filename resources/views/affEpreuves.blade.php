@extends('template')
@section('titre')
    Les epreuves
@endsection

@section('contenu')


    {{-- errors modal --}}
    <div class="container-fluid p-4">
        <h1>
            Gestion des Epreuves
        </h1>
        @if ($errors->any())
            <div class="alert alert-danger m-2">
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
            <div class="alert alert-success">
                <p>
                    {{ \Session::get('success') }}
                </p>
            </div>
        @endif
        {{-- end errors modal --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary align-items-center pull-right m-2" data-bs-toggle="modal"
            data-bs-target="#addmodal">
            Ajouter <i class="fa fa-plus fa-x"></i>
        </button>

        <!-- AddModal -->
        <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addmodalLabel">Ajouter</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-floating" method="POST" action="/affEpreuves/add" id="editform">
                        {{-- input security --}}
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            <label class="p-2">Date</label>
                            <input type="text" class="form-control" name="date_ep" id="val2"
                                placeholder="Ex: 2022-12-12" required>

                            <label class="p-2">Lieu</label>
                            <input type="text" class="form-control" name="lieu_ep" id="val3" placeholder="salle-112"
                                required>
                            {{-- change to selectbox from database --}}
                            <label class="p-2">Code matiere</label>
                            <select class="form-select" aria-label="Default select example" name="matiere_id" required>
                                <option disabled selected>Selectionné un code matiere</option>
                                @foreach ($mat as $m)
                                <option value=" {{ $m->id }}"> {{ $m->code_mat }}</option>
                                @endforeach
                            </select>
                           
                            {{-- end select box --}}
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
    </div>
    {{-- end addmodal --}}
    {{-- table info --}}
    <table class="table table-sm" id="datatable">
        <thead>
            <tr>
                <th>
                    Code epreuve
                </th>
                <th>
                    Date
                </th>
                <th>
                    Lieu
                </th>
                <th>
                    ID matiere
                </th>
                <th>
                    Code matiere
                </th>
                <th>
                    Modifier
                </th>
                <th>
                    supprimer
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- show info from database --}}
            @foreach ($epreuves as $epreuve)
                <tr>
                    <td>
                        {{ $epreuve->id }}
                    </td>
                    <td>
                        {{ $epreuve->date_ep }}
                    </td>
                    <td>
                        {{ $epreuve->lieu_ep }}
                    </td>
                    <td>
                        {{ $epreuve->matiere_id }}
                    </td>
                    <td>
                        {{ $epreuve->matieres->code_mat }}
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success align-items-center" data-bs-toggle="modal"
                            data-bs-target="#editmodal{{ $epreuve->id }}">
                            <i class="fa fa-edit fa-x "></i>
                        </button>

                        <!-- editModal -->
                        <div class="modal fade" id="editmodal{{ $epreuve->id }}" tabindex="-1"
                            aria-labelledby="editmodalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editmodalLabel">Modifier</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form class="form-floating" method="POST"
                                        action="/affEpreuves/edit/{{ $epreuve->id }}" id="editform">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <div class="modal-body">
                                            <label class="p-2">Code epreuve</label>
                                            <input type="text" value="{{ $epreuve->id }}" class="form-control"
                                                name="code_ep" id="val1" disabled="disabled">
                                            <label class="p-2">Date</label>
                                            <input type="text" value="{{ $epreuve->date_ep }}" class="form-control"
                                                name="date_ep" id="val2" required>

                                            <label class="p-2">Lieu</label>
                                            <input type="text" value=" {{ $epreuve->lieu_ep }}" class="form-control"
                                                name="lieu_ep" id="val3" required>

                                            {{--  a modifier en selectbox from database  --}}
                                            <label class="p-2">Code matiere</label>
                                            <input type="text" value="{{ $epreuve->matieres->code_mat }}"
                                                class="form-control"  id="val4" disabled>
                                                <br>
                                                <select class="form-select" aria-label="Default select example" name="matiere_id" required>
                                                    <option disabled selected>Selectionné pour changé le code matiere</option>
                                                    @foreach ($mat as $m)
                                                    <option value=" {{ $m->id }}"> {{ $m->code_mat }}</option>
                                                    @endforeach
                                                </select>
                                            {{-- end select box --}}
                                            <br>
                                            <div class="modal-footer m-2">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-success"
                                                    id="submit">Confirmer</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        {{-- end editemodal --}}
                    </td>
                    <td>
                        {{-- delete row  --}}
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $epreuve->id }}">
                            <i class="fa fa-trash"></i>
                        </button>

                        <!-- Modal -->

                        <div class="modal fade" id="exampleModal{{ $epreuve->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form class="form-floating" method="POST"
                                    action="/affEpreuves/delete/{{ $epreuve->id }}" id="editform">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> <i
                                                    class="fa fa-warning text-danger fa-2x"></i></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            voulez-vous supprimé cette epreuve!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-outline-danger"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- end delete row --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- end table info --}}
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
