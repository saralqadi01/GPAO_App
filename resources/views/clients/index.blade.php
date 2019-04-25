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
                                <strong class="card-title">Gestion de client</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Adresse</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        {{ csrf_field() }}
                                    </thead>
                                    <tbody>
                                        @foreach($clients as $client )
                                        <tr class="item{{$client->id}}">
                                            <td>{{ $client->nom }}</td>
                                            <td>{{ $client->prenom }}</td>
                                            <td>{{ $client->adrs}}</td>
                                            <td>{{ $client->num_tel}}</td>
                                            <td>{{ $client->email}}</td>
                                            <td>
                                                <span class="show-modal btn btn-sm btn-outline-success" data-toggle="modal" data-target="#showModal" data-nom="{{$client->nom}}" data-prenom="{{$client->prenom}}" data-adrs="{{$client->adrs}}" data-num_tel="{{$client->num_tel}}" data-email="{{$client->email}}">
                                                <i class="fa fa-eye"></i></span>
                                                <span class="edit-modal btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editModal" data-id="{{$client->id}}" data-nom="{{$client->nom}}" data-prenom="{{$client->prenom}}" data-adrs="{{$client->adrs}}" data-num_tel="{{$client->num_tel}}" data-email="{{$client->email}}">
                                                <i class="fa fa-pencil"></i></span>
                                                <span class="delete-modal btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$client->id}}"  data-nom="{{$client->nom}}" data-prenom="{{$client->prenom}}" data-adrs="{{$client->adrs}}" data-num_tel="{{$client->num_tel}}" data-email="{{$client->email}}">
                                                <i class="fa fa-trash-o"></i></span>

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


<!-- Modal form to add a Client -->
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
                            <label for="text-input" class="form-control-label">Nom:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nom_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Prénom:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="prenom_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Adresse:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="adrs_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Télephone:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="num_tel_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Email:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="email_add" placeholder="Text" class="form-control">
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

<!-- End Modal form to add a Client -->

<!-- Modal form to show a Client -->
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
                            <label class="control-label col-sm-2" for="nom">Nom:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="name_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="prenom">Prenom:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="prenom_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="adrs">Adresse:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <textarea class="form-control" id="adrs_show" disabled></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="num_tel">Telephone:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="num_tel_show" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="email_show" disabled>
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
<!-- End Modal form to show a Client -->

<!-- Modal form to edit a Client -->
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
                            <label for="text-input" class="form-control-label">Nom:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="nom_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Prénom:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="prenom_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Adresse:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="adrs_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Téléphone:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="num_tel_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Email:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="email_edit">
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
<!-- End Modal form to edit a Client -->

<!-- Modal form to delete a Client -->
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
                            <label class="control-label col-sm-2" for="nom">Nom:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nom_delete" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="prenom">Prénom:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="prenom_delete" disabled>
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
<!-- End Modal form to delete a Client -->

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
        

        // Show a client
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('');
            $('#name_show').val($(this).data('nom'));
            $('#prenom_show').val($(this).data('prenom'));
            $('#adrs_show').val($(this).data('adrs'));
            $('#num_tel_show').val($(this).data('num_tel'));
            $('#email_show').val($(this).data('email'));
            $('#showModal').modal('show');
        });


        // add a new client
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'clients',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'nom': $('#nom_add').val(),
                    'prenom': $('#prenom_add').val(),
                    'adrs': $('#adrs_add').val(),
                    'num_tel': $('#num_tel_add').val(),
                    'email': $('#email_add').val(),
                },
                success: function(data) {

                        toastr.success('Successfully added Client!', 'Success Alert', {timeOut: 5000});
                        $('#bootstrap-data-table-export').append("<tr class='item" + data.id + "'><td>" + data.nom + "</td><td>" + data.prenom + "</td><td>" + data.adrs + "</td><td>" + data.num_tel + "</td><td>" + data.email + "</td><td><span class='show-modal btn btn-sm btn-outline-success' data-nom='" + data.nom + "' data-prenom='" + data.prenom + "' data-adrs='" + data.adrs + "' data-num_tel='" + data.num_tel + "' data-email='" + data.email + "'><i class='fa fa-eye'></i></span> <span class='edit-modal btn btn-sm btn-outline-warning' data-nom='" + data.nom + "' data-prenom='" + data.prenom + "' data-adrs='" + data.adrs + "' data-num_tel='" + data.num_tel + "' data-email='" + data.email + "'><i class='fa fa-pencil'></i></span><span class='delete-modal btn btn-sm btn-outline-danger' data-nom='" + data.nom + "' data-prenom='" + data.prenom + "' data-adrs='" + data.adrs + "' data-num_tel='" + data.num_tel + "' data-email='" + data.email + "'><i class='fa fa-trash-o'></i></span></td></tr>");

                        
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: 'clients',
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

        // Edit a client
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('');
            $('#id_edit').val($(this).data('id'));
            $('#nom_edit').val($(this).data('nom'));
            $('#prenom_edit').val($(this).data('prenom'));
            $('#adrs_edit').val($(this).data('adrs'));
            $('#num_tel_edit').val($(this).data('num_tel'));
            $('#email_edit').val($(this).data('email'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'clients/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id").val(),
                    'nom': $("#nom_edit").val(),
                    'prenom': $('#prenom_edit').val(),
                    'adrs': $('#adrs_edit').val(),
                    'num_tel': $('#num_tel_edit').val(),
                    'email': $('#email_edit').val()
                },
                success: function(data) {
                    $('.errorNom').addClass('hidden');
                    $('.errorPrenom').addClass('hidden');
                    $('.errorAdrs').addClass('hidden');
                    $('.errorNum_tel').addClass('hidden');
                    $('.errorEmail').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.nom) {
                            $('.errorNom').removeClass('hidden');
                            $('.errorNom').text(data.errors.nom);
                        }
                        if (data.errors.prenom) {
                            $('.errorPrenom').removeClass('hidden');
                            $('.errorPrenom').text(data.errors.prenom);
                        }
                        if (data.errors.adrs) {
                            $('.errorAdrs').removeClass('hidden');
                            $('.errorAdrs').text(data.errors.adrs);
                        }
                        if (data.errors.num_tel) {
                            $('.errorNum_tel').removeClass('hidden');
                            $('.errorNum_tel').text(data.errors.num_tel);
                        }
                        if (data.errors.email) {
                            $('.errorEmail').removeClass('hidden');
                            $('.errorEmail').text(data.errors.email);
                        }
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.nom + "</td><td>" + data.prenom + "</td><td>" + data.adrs + "</td><td>" + data.num_tel + "</td><td>" + data.email + "</td><td><span class='show-modal btn btn-sm btn-outline-success' data-nom='" + data.nom + "' data-prenom='" + data.prenom + "' data-adrs='" + data.adrs + "' data-num_tel='" + data.num_tel + "' data-email='" + data.email + "'><i class='fa fa-eye'></i></span> <span class='edit-modal btn btn-sm btn-outline-warning' data-nom='" + data.nom + "' data-preom='" + data.prenom + "' data-adrs='" + data.adrs + "' data-num_tel='" + data.num_tel + "' data-email='" + data.email + "'><i class='fa fa-pencil'></i></span> <span class='delete-modal btn btn-sm btn-outline-danger' data-nom='" + data.nom + "' data-prenom='" + data.prenom + "' data-adrs='" + data.adrs + "' data-num_tel='" + data.num_tel + "' data-email='" + data.email + "'><i class='fa fa-trash-o'></i></span></td></tr>");
                        
                    }
                }
            });
        });

        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('');
            $('#id_delete').val($(this).data('id'));
            $('#nom_delete').val($(this).data('nom'));
            $('#prenom_delete').val($(this).data('prenom'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'clients/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                }
            });
        });



</script>

@endsection