@extends('layouts.master')

@section('content')


<html class="no-js" lang="en">


<!-- toastr notifications -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> 



<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 



<head>

<style>
.button {
  background-color: #3cb371; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button0 {
  background-color: #b4b4b4; /* Grey */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {
  background-color: #00BFFF; /* Blue */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button3 {
  background-color: #B22222; /* Red */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button4 {
  background-color: #DEB887; /*  */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {border-radius: 12px;}

.btn-sm {
    border-radius: 6px;
    border: solid;
}

</style>


	<link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">

    
</head>

<body>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <button class="button0 button1 btn btn-default" >
                    <a href="acceuil"> Retour </a>
                    </button>
                    <button class="button button1 add-modal" data-toggle="modal" data-target="#addModal">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
            

            <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Gestion de projet</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                
                                    <thead>
                                        <tr>
                                            <th>Libelle</th>
                                            <th>Client</th>
                                            <th>Date début</th>
                                            <th>Date fin</th>
                                            <th>Action</th>
                                        </tr>
                                        {{ csrf_field() }}
                                    </thead>
                                    <tbody>
                                        @foreach($produits as $produit )
                                        <tr class="item{{$produit->id}}">
                                            <td><a href="profil/{{ $produit->id }}">{{ $produit->libelle }}</a></td>
                                            
                                            @foreach($clients as $client)
                                            @if($produit->client_id == $client->id)
                                            <td>{{ $client->nom }} {{ $client->prenom }}</td>
                                            @endif
                                            @endforeach

                                            <td>{{ $produit->date_debut}}</td>
                                            <td>{{ $produit->date_fin}}</td>
                                            <td>
                                                <button class="show-modal button button1" data-toggle="modal" data-target="#showModal" data-libelle="{{$produit->libelle}}" data-client_id="{{$produit->client_id}}" data-date_debut="{{$produit->date_debut}}" data-date_fin="{{$produit->date_fin}}">
                                                <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                                <button class="edit-modal button2 button1" data-toggle="modal" data-target="#editModal" data-id="{{$produit->id}}" data-libelle="{{$produit->libelle}}" data-client_id="{{$produit->client_id}}" data-date_debut="{{$produit->date_debut}}" data-date_fin="{{$produit->date_fin}}">
                                                <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                                <button class="delete-modal button3 button1" data-toggle="modal" data-target="#deleteModal" data-id="{{$produit->id}}"  data-libelle="{{$produit->libelle}}" data-client_id="{{$produit->client_id}}" data-date_debut="{{$produit->date_debut}}" data-date_fin="{{$produit->date_fin}}">
                                                <span class="glyphicon glyphicon-trash"></span> Delete</button>

                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
            </div><!-- .content -->

           

<!-- Modal form to add a Project -->
<div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Nom Projet:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="libelle_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Client:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <select name="select" id="client_id_add" class="form-control">
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->nom}} {{$client->prenom}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Date début:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="date_debut_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Date fin:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="date_fin_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="button button1 add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="button4 button1" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- End Modal form to add a Project -->

<!-- Modal form to show a Project -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Show</h4>
                </div>


                <div class="modal-body">
                    <form class="form-horizontal" role="form">

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="libelle">Nom projet:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="libelle_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Client:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <select name="select" id="client_id_show" class="form-control" disabled>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->nom}} {{$client->prenom}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="date_debut">Date début:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="date" class="form-control" id="date_debut_show" cols="40" rows="5" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="date_fin">Date fin:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="date" class="form-control" id="date_fin_show" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="button4 button1" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to show a Project -->

<!-- Modal form to edit a Project -->
<div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">

                        <div class="row form-group">
                        <div class="col-md-0">
                                <input type="hidden" class="form-control" id="id_edit">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Nom projet:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="libelle_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Client:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="select" id="client_id_edit" class="form-control">
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->nom}} {{$client->prenom}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Date début:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="date_debut_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Date fin:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="date_fin_edit">
                            </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="button button1  edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="button4 button1 " data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to edit a Project -->

<!-- Modal form to delete a Project -->
<div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following Client?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        
                    <div class="row form-group">
                            
                            <div class="col-sm-0">
                                <input type="hidden" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="libelle">Nom Projet:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="libelle_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="button3 button1 delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="button4 button1" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to delete a Project -->

    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>



    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
    

</body>

</html>

@endsection

@section('javascript')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

<!-- toastr notifications -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<!-- Delay table load until everything else is loaded -->
<script>
    $(window).load(function(){
        $('#bootstrap-data-table-export').removeAttr('style');
    })
</script>


    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        

        // Show a projet
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('');
            $('#libelle_show').val($(this).data('libelle'));
            $('#client_id_show').val($(this).data('client_id'));
            $('#date_debut_show').val($(this).data('date_debut'));
            $('#date_fin_show').val($(this).data('date_fin'));
            $('#showModal').modal('show');
        });


        // add a new projet
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'produits',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'libelle': $('#libelle_add').val(),
                    'client_id': $('#client_id_add').val(),
                    'date_debut': $('#date_debut_add').val(),
                    'date_fin': $('#date_fin_add').val(),
                },
                success: function(data) {

                    
                        toastr.success('Successfully added Projet!', 'Success Alert', {timeOut: 5000});
                        $('#bootstrap-data-table-export').append("<tr class='item" + data.id + "'><td>" + data.libelle + "</td><td>" + data.client_id + "</td><td>" + data.date_debut + "</td><td>" + data.date_fin + "</td><td><button class='show-modal button button1' data-libelle='" + data.libelle + "' data-client_id='" + data.client_id + "' data-date_debut='" + data.date_debut + "' data-date_fin='" + data.date_fin + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal button2 button1' data-libelle='" + data.libelle + "' data-client_id='" + data.client_id + "' data-date_debut='" + data.date_debut + "' data-date_fin='" + data.date_fin + "'><span class='glyphicon glyphicon-edit'></span> Edit</button><button class='delete-modal button3 button1' data-libelle='" + data.libelle + "' data-client_id='" + data.client_id + "' data-date_debut='" + data.date_debut + "' data-date_fin='" + data.date_fin + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                        
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: 'produits',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                    // empty
                                },
                            });
                        });
                    
                },
            });
        });

        // Edit projet
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('');
            $('#id_edit').val($(this).data('id'));
            $('#libelle_edit').val($(this).data('libelle'));
            $('#client_id_edit').val($(this).data('client_id'));
            $('#date_debut_edit').val($(this).data('date_debut'));
            $('#date_fin_edit').val($(this).data('date_fin'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'produits/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id").val(),
                    'libelle': $("#libelle_edit").val(),
                    'client_id': $('#client_id_edit').val(),
                    'date_debut': $('#date_debut_edit').val(),
                    'date_fin': $('#date_fin_edit').val()
                },
                success: function(data) {

                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.libelle + "</td><td>" + data.client_id + "</td><td>" + data.date_debut + "</td><td>" + data.date_fin + "</td><td><button class='show-modal button button1' data-libelle='" + data.libelle + "' data-client_id='" + data.client_id + "' data-date_debut='" + data.date_debut + "' data-date_fin='" + data.date_fin + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal button2 button1' data-libelle='" + data.libelle + "' data-client_id='" + data.client_id + "' data-date_debut='" + data.date_debut + "' data-date_fin='" + data.date_fin + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal button3 button1' data-libelle='" + data.libelle + "' data-client_id='" + data.client_id + "' data-date_debut='" + data.date_debut + "' data-date_fin='" + data.date_fin + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                        
                    
                }
            });
        });

        // delete projet
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('');
            $('#id_delete').val($(this).data('id'));
            $('#libelle_delete').val($(this).data('libelle'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'produits/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Projet!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                }
            });
        });



</script>

@endsection