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
                                <strong class="card-title">Gestion de Poste de charges</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Opération</th>
                                            <th>Main d'oeuvre</th>
                                            <th>Désignation</th>
                                            <th>Nombre de poste</th>
                                            <th>Commentaire</th>
                                            <th>Action</th>
                                        </tr>
                                        {{ csrf_field() }}
                                    </thead>
                                    <tbody>
                                        @foreach($poste_charges as $poste_charges )
                                        <tr class="item{{$poste_charges->id}}">
                                            <td>{{ $poste_charges->id_operation }}</td>
                                            <td>{{ $poste_charges->main_oeuvre }}</td>
                                            <td>{{ $poste_charges->designation}}</td>
                                            <td>{{ $poste_charges->nbre_poste}}</td>
                                            <td>{{ $poste_charges->commentaire}}</td>
                                            <td>
                                                <span class="show-modal btn btn-sm btn-outline-success" data-toggle="modal" data-target="#showModal" data-id_operation="{{$poste_charges->id_operation}}" data-num_section="{{$poste_charges->num_section}}" data-num_soussection="{{$poste_charges->num_soussection}}" data-machine="{{$poste_charges->machine}}" data-main_oeuvre="{{$poste_charges->main_oeuvre}}" data-designation="{{$poste_charges->designation}}" data-taux_horaire_forfait="{{$poste_charges->taux_horaire_forfait}}" data-nbre_poste="{{$poste_charges->nbre_poste}}" data-capacité_nominale="{{$poste_charges->capacité_nominale}}" data-commentaire="{{$poste_charges->commentaire}}">
                                                <i class="fa fa-eye"></i></span>
                                                <span class="edit-modal btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editModal" data-id="{{$poste_charges->id}}" data-id_operation="{{$poste_charges->id_operation}}" data-num_section="{{$poste_charges->num_section}}" data-num_soussection="{{$poste_charges->num_soussection}}" data-machine="{{$poste_charges->machine}}" data-main_oeuvre="{{$poste_charges->main_oeuvre}}" data-designation="{{$poste_charges->designation}}" data-taux_horaire_forfait="{{$poste_charges->taux_horaire_forfait}}" data-nbre_poste="{{$poste_charges->nbre_poste}}" data-capacité_nominale="{{$poste_charges->capacité_nominale}}" data-commentaire="{{$poste_charges->commentaire}}">
                                                <i class="fa fa-pencil"></i></span>
                                                <span class="delete-modal btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$poste_charges->id}}"  data-id_operation="{{$poste_charges->id_operation}}" data-num_section="{{$poste_charges->num_section}}" data-num_soussection="{{$poste_charges->num_soussection}}" data-machine="{{$poste_charges->machine}}" data-main_oeuvre="{{$poste_charges->main_oeuvre}}" data-designation="{{$poste_charges->designation}}" data-taux_horaire_forfait="{{$poste_charges->taux_horaire_forfait}}" data-nbre_poste="{{$poste_charges->nbre_poste}}" data-capacité_nominale="{{$poste_charges->capacité_nominale}}" data-commentaire="{{$poste_charges->commentaire}}">
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


<!-- Modal form to add Poste de charge -->
<div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Opération:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="id_operation_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">numéro de section:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="num_section_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">numéro de soussection:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="num_soussection_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Machine:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="machine_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Main d'oeuvre:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="main_oeuvre_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Désignation:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="designation_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">taux_horaire_forfait:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="taux_horaire_forfait_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Nombre de poste:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="nbre_poste_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    </div>



                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Capacité nominale:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="capacité_nominale_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Commentaire:</label>
                        </div>
                        <div class="col">
                            <textarea  id="commentaire_add" class="form-control"></textarea>
                        </div>
                    </div>
                    </div>
                    </div>



                    </form>
                    <div class="modal-footer">
                        <button type="button" class="button button1 add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="button4 button1" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- End Modal form to add Poste de charges -->

<!-- Modal form to show Poste de charges -->
<div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Show</h4>
                </div>


                <div class="modal-body">
                    <form class="form-horizontal" role="form">

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="id_operation">Opération:</label>
                        </div>
                        <div class="col">
                            <input type="name" class="form-control" id="id_operation_show" disabled>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="num_section">Numéro de Section:</label>
                        </div>
                        <div class="col">
                            <input type="name" class="form-control" id="num_section_show" disabled>
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="num_soussection">numéro de soussection:</label>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" id="num_soussection_show" cols="40" rows="5" disabled>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="machine">Machine:</label>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" id="machine_show" cols="40" rows="5" disabled>
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="main_oeuvre">Main d'oeuvre:</label>
                        </div>
                            <div class="col">
                                <input class="form-control" type="text" id="main_oeuvre_show" cols="40" rows="5" disabled>
                            </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="designation">Désignation:</label>
                        </div>
                            <div class="col">
                                <input class="form-control" type="text" id="designation_show" cols="40" rows="5" disabled>
                            </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="taux_horaire_forfait">taux_horaire_forfait:</label>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" id="taux_horaire_forfait_show" cols="40" rows="5" disabled>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="nbre_poste">nombre de poste:</label>
                        </div>
                        <div class="col">
                        <input class="form-control" type="text" id="nbre_poste_show" cols="40" rows="5" disabled>
                        </div>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="capacité_nominale">Capacité nominale:</label>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" id="capacité_nominale_show" cols="40" rows="5" disabled>
                        </div>
                        </div>
                        </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="commentaire">Commentaire:</label>
                        </div>
                            <div class="col">
                                <textarea class="form-control" id="commentaire_show" disabled></textarea>
                            </div>
                    </div>
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
<!-- End Modal form to show a Poste de charge -->

<!-- Modal form to edit a Poste de charge -->
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
                        
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Opération:</label>
                        </div>
                        <div class="col">
                                <input type="text" class="form-control" id="id_operation_edit">
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Numéro de section:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="num_section_edit">
                        </div>
                    </div>
                    </div>
                    </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Numéro de soussection:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="num_soussection_edit">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Machine:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="machine_edit">
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Main d'oeuvre:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="main_oeuvre_edit">
                            </div>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Désignation:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="designation_edit">
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">taux_horaire_forfait:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="taux_horaire_forfait_edit">
                            </div>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Nombre de poste:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="nbre_poste_edit">
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Capacité nominale:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="capacité_nominale_edit">
                            </div>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Commentaire:</label>
                            </div>
                            <div class="col">
                                <textarea class="form-control" id="commentaire_edit"></textarea>
                            </div>
                        </div>
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
<!-- End Modal form to edit Atelier -->

<!-- Modal form to delete Atelier -->
<div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following Poste de charges?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        
                    <div class="row form-group">
                            
                            <div class="col-sm-0">
                                <input type="hidden" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="designation">Désignation:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="designation_delete" disabled>
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
        
        // Show atelier
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('');
            $('#id_operation_show').val($(this).data('id_operation'));
            $('#num_section_show').val($(this).data('num_section'));
            $('#num_soussection_show').val($(this).data('num_soussection'));
            $('#machine_show').val($(this).data('machine'));
            $('#main_oeuvre_show').val($(this).data('main_oeuvre'));
            $('#designation_show').val($(this).data('designation'));
            $('#taux_horaire_forfait_show').val($(this).data('taux_horaire_forfait'));
            $('#nbre_poste_show').val($(this).data('nbre_poste'));
            $('#capacité_nominale_show').val($(this).data('capacité_nominale'));
            $('#commentaire_show').val($(this).data('commentaire'));
            $('#showModal').modal('show');
        });


        // add a new atelier
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'poste_charges',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id_operation': $('#id_operation_add').val(),
                    'num_section': $('#num_section_add').val(),
                    'num_soussection': $('#num_soussection_add').val(),
                    'machine': $('#machine_add').val(),
                    'main_oeuvre': $('#main_oeuvre_add').val(),
                    'designation': $('#designation_add').val(),
                    'taux_horaire_forfait': $('#taux_horaire_forfait_add').val(),
                    'nbre_poste': $('#nbre_poste_add').val(),
                    'capacité_nominale': $('#capacité_nominale_add').val(),
                    'commentaire': $('#commentaire_add').val(),
                },
                success: function(data) {

                     
                        toastr.success('Successfully added Poste de charges!', 'Success Alert', {timeOut: 5000});
                        $('#bootstrap-data-table-export').append("<tr class='item" + data.id + "'><td>" + data.id_operation + "</td><td>" + data.main_oeuvre + "</td><td>" + data.designation + "</td><td>" + data.nbre_poste + "</td><td>" + data.commentaire + "</td><td><span class='show-modal btn btn-sm btn-outline-success' data-id_operation='" + data.id_operation + "' data-num_section='" + data.num_section + "' data-num_soussection='" + data.num_soussection + "' data-machine='" + data.machine + "' data-main_oeuvre='" + data.main_oeuvre + "' data-designation='" + data.designation + "' data-taux_horaire_forfait='" + data.taux_horaire_forfait + "' data-nbre_poste='" + data.nbre_poste + "' data-capacité_nominale='" + data.capacité_nominale + "' data-commentaire='" + data.commentaire + "'><i class='fa fa-eye'></i></span> <span class='edit-modal btn btn-sm btn-outline-warning' data-id_operation='" + data.id_operation + "' data-num_section='" + data.num_section + "' data-num_soussection='" + data.num_soussection + "' data-machine='" + data.machine + "' data-main_oeuvre='" + data.main_oeuvre + "' data-designation='" + data.designation + "' data-taux_horaire_forfait='" + data.taux_horaire_forfait + "' data-nbre_poste='" + data.nbre_poste + "' data-capacité_nominale='" + data.capacité_nominale + "' data-commentaire='" + data.commentaire + "'><i class='fa fa-pencil'></i></span><span class='delete-modal btn btn-sm btn-outline-danger' data-id_operation='" + data.id_operation + "' data-num_section='" + data.num_section + "' data-num_soussection='" + data.num_soussection + "' data-machine='" + data.machine + "' data-main_oeuvre='" + data.main_oeuvre + "' data-designation='" + data.designation + "' data-taux_horaire_forfait='" + data.taux_horaire_forfait + "' data-nbre_poste='" + data.nbre_poste + "' data-capacité_nominale='" + data.capacité_nominale + "' data-commentaire='" + data.commentaire + "'><i class='fa fa-trash-o'></i></span></td></tr>");

                        
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: 'poste_charges',
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


        // Edit ateliers
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('');
            $('#id_edit').val($(this).data('id'));
            $('#id_operation_edit').val($(this).data('id_operation'));
            $('#num_section_edit').val($(this).data('num_section'));
            $('#num_soussection_edit').val($(this).data('num_soussection'));
            $('#machine_edit').val($(this).data('machine'));
            $('#main_oeuvre_edit').val($(this).data('main_oeuvre'));
            $('#designation_edit').val($(this).data('designation'));
            $('#taux_horaire_forfait_edit').val($(this).data('taux_horaire_forfait'));
            $('#nbre_poste_edit').val($(this).data('nbre_poste'));
            $('#capacité_nominale_edit').val($(this).data('capacité_nominale'));
            $('#commentaire_edit').val($(this).data('commentaire'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'poste_charges/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id").val(),
                    'id_operation': $("#id_operation_edit").val(),
                    'num_section': $('#num_section_edit').val(),
                    'num_soussection': $('#num_soussection_edit').val(),
                    'machine': $('#machine_edit').val(),
                    'main_oeuvre': $('#main_oeuvre_edit').val(),
                    'designation': $('#designation_edit').val(),
                    'taux_horaire_forfait': $('#taux_horaire_forfait_edit').val(),
                    'nbre_poste': $('#nbre_poste_edit').val(),
                    'capacité_nominale': $('#capacité_nominale_edit').val(),
                    'commentaire': $('#commentaire_edit').val(),
                },
                success: function(data) {
                    
                    toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id_operation + "</td><td>" + data.main_oeuvre + "</td><td>" + data.designation + "</td><td>" + data.nbre_poste + "</td><td>" + data.commentaire + "</td><td><span class='show-modal btn btn-sm btn-outline-success' data-id_operation='" + data.id_operation + "' data-num_section='" + data.num_section + "' data-num_soussection='" + data.num_soussection + "' data-machine='" + data.machine + "' data-main_oeuvre='" + data.main_oeuvre + "' data-designation='" + data.designation + "' data-taux_horaire_forfait='" + data.taux_horaire_forfait + "' data-nbre_poste='" + data.nbre_poste + "' data-capacité_nominale='" + data.capacité_nominale + "' data-commentaire='" + data.commentaire + "'><i class='fa fa-eye'></i></span> <span class='edit-modal btn btn-sm btn-outline-warning' data-id_operation='" + data.id_operation + "' data-num_section='" + data.num_section + "' data-num_soussection='" + data.num_soussection + "' data-machine='" + data.machine + "' data-main_oeuvre='" + data.main_oeuvre + "' data-designation='" + data.designation + "' data-taux_horaire_forfait='" + data.taux_horaire_forfait + "' data-nbre_poste='" + data.nbre_poste + "' data-capacité_nominale='" + data.capacité_nominale + "' data-commentaire='" + data.commentaire + "'><i class='fa fa-pencil'></i></span> <span class='delete-modal btn btn-sm btn-outline-danger'  data-id_operation='" + data.id_operation + "' data-num_section='" + data.num_section + "' data-num_soussection='" + data.num_soussection + "' data-machine='" + data.machine + "' data-main_oeuvre='" + data.main_oeuvre + "' data-designation='" + data.designation + "' data-taux_horaire_forfait='" + data.taux_horaire_forfait + "' data-nbre_poste='" + data.nbre_poste + "' data-capacité_nominale='" + data.capacité_nominale + "' data-commentaire='" + data.commentaire + "'><i class='fa fa-trash-o'></i></span></td></tr>");
                        
                    
                }
            });
        });

        // delete atelier
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('');
            $('#id_delete').val($(this).data('id'));
            $('#designation_delete').val($(this).data('designation'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'poste_charges/' + id,
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