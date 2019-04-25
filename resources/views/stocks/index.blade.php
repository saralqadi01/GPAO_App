@extends('layouts.master')

@section('content')


<html class="no-js" lang="en">




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

    <!-- toastr notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
                                <strong class="card-title">Gestion de Stock</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                
                                    <thead>
                                        <tr>
                                            <th>Référence</th>
                                            <th>Désignation</th>
                                            <th>Nomenclature</th>
                                            <th>Type</th>
                                            <th>Unité</th>
                                            <th>Action</th>
                                        </tr>
                                        {{ csrf_field() }}
                                    </thead>
                                    <tbody>
                                        @foreach($stocks as $stock )
                                        <tr class="item{{$stock->id}}">
                                            <td>{{ $stock->reference }}</td>
                                            <td>{{ $stock->designation }}</td>
                                            <td>{{ $stock->nomenclature}}</td>
                                            <td>{{ $stock->type}}</td>
                                            <td>{{ $stock->unite}}</td>
                                            <td>
                                                <span class="show-modal btn btn-sm btn-outline-success" data-toggle="modal" data-target="#showModal" data-reference="{{$stock->reference}}" data-designation="{{$stock->designation}}" data-nomenclature="{{$stock->nomenclature}}" data-type="{{$stock->type}}" data-unite="{{$stock->unite}}" data-delai_semaine="{{$stock->delai_semaine}}" data-prix_standard="{{$stock->prix_standard}}" data-lot_reaprvs="{{$stock->lot_reaprvs}}" data-stock_min="{{$stock->stock_min}}" data-stock_max="{{$stock->stock_max}}">
                                                <i class="fa fa-eye"></i></span>
                                                <span class="edit-modal btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editModal" data-id="{{$stock->id}}" data-reference="{{$stock->reference}}" data-designation="{{$stock->designation}}" data-nomenclature="{{$stock->nomenclature}}" data-type="{{$stock->type}}" data-unite="{{$stock->unite}}" data-delai_semaine="{{$stock->delai_semaine}}" data-prix_standard="{{$stock->prix_standard}}" data-lot_reaprvs="{{$stock->lot_reaprvs}}" data-stock_min="{{$stock->stock_min}}" data-stock_max="{{$stock->stock_max}}">
                                                <i class="fa fa-pencil"></i></span>
                                                <span class="delete-modal btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$stock->id}}"  data-reference="{{$stock->reference}}" data-designation="{{$stock->designation}}" data-nomenclature="{{$stock->nomenclature}}" data-type="{{$stock->type}}" data-unite="{{$stock->unite}}" data-delai_semaine="{{$stock->delai_semaine}}" data-prix_standard="{{$stock->prix_standard}}" data-lot_reaprvs="{{$stock->lot_reaprvs}}" data-stock_min="{{$stock->stock_min}}" data-stock_max="{{$stock->stock_max}}">
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


<!-- Modal form to add a Stock -->
<div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
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
                            <label for="text-input" class="form-control-label">Référence:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="reference_add" placeholder="Text" class="form-control">
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
                            <label for="text-input" class="form-control-label">Nomenclature:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="nomenclature_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Type:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="type_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Unité:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="unite_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Délai en semaine:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="delai_semaine_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Prix standard:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="prix_standard_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Lot de réaprovisionnement:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="lot_reaprvs_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Stock min:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="stock_min_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col">
                            <label for="text-input" class="form-control-label">Stock max:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="stock_max_add" placeholder="Text" class="form-control">
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

<!-- End Modal form to add Stock -->

<!-- Modal form to show Stock -->
<div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
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
                                <label class="control-label" for="reference">Référence:</label>
                            </div>
                            <div class="col">
                                <input type="name" class="form-control" id="reference_show" disabled>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                        <div class="col">
                            <label class="control-label" for="designation">Désignation:</label>
                        </div>
                            <div class="col">
                                <input type="name" class="form-control" id="designation_show" disabled>
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label class="control-label" for="nomenclature">Nomenclature:</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="nomenclature_show" disabled>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label class="control-label" for="type">Type:</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="type_show" disabled>
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label class="control-label" for="unite">Unité:</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="unite_show" disabled>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label class="control-label" for="delai_semaine">delai en semaine:</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="delai_semaine_show" disabled>
                            </div>
                        </div>
                        </div>
                        </div>


                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label class="control-label" for="prix_standard">Prix standard:</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="prix_standard_show" disabled>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label class="control-label" for="lot_reaprvs">Lot de réaprovisionnement:</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="lot_reaprvs_show" disabled>
                            </div>
                        </div>
                        </div>
                        </div>


                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label class="control-label" for="stock_min">Stock min:</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="stock_min_show" disabled>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label class="control-label" for="stock_max">Stock max:</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="stock_max_show" disabled>
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
<!-- End Modal form to show a Stock -->

<!-- Modal form to edit a Stock -->
<div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
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
                                <label for="text-input" class="form-control-label">Référence:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="reference_edit">
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
                                <label for="text-input" class="form-control-label">Nomenclature:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="nomenclature_edit">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Type:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="type_edit">
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Unité:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="unite_edit">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Délai en semaine:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="delai_semaine_edit">
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Prix standard:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="prix_standard_edit">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Lot de réaprovisionnement:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="lot_reaprvs_edit">
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Stock min:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="stock_min_edit">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col">
                                <label for="text-input" class="form-control-label">Stock max:</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="stock_max_edit">
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
                    <h3 class="text-center">Are you sure you want to delete the following Client?</h3>
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
        
        // add a new stocks
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'stocks',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'reference': $('#reference_add').val(),
                    'designation': $('#designation_add').val(),
                    'nomenclature': $('#nomenclature_add').val(),
                    'type': $('#type_add').val(),
                    'unite': $('#unite_add').val(),
                    'delai_semaine': $('#delai_semaine_add').val(),
                    'prix_standard': $('#prix_standard_add').val(),
                    'lot_reaprvs': $('#lot_reaprvs_add').val(),
                    'stock_min': $('#stock_min_add').val(),
                    'stock_max': $('#stock_max_add').val(),
                },
                success: function(data) {

                     
                        toastr.success('Successfully added Stock!', 'Success Alert', {timeOut: 5000});
                        $('#bootstrap-data-table-export').append("<tr class='item" + data.id + "'><td>" + data.reference + "</td><td>" + data.designation + "</td><td>" + data.nomenclature + "</td><td>" + data.type + "</td><td>" + data.unite + "</td><td><span class='show-modal btn btn-sm btn-outline-success' data-reference='" + data.reference + "' data-designation='" + data.designation + "' data-nomenclature='" + data.nomenclature + "' data-type='" + data.type + "' data-unite='" + data.unite + "' data-delai_semaine='" + data.delai_semaine + "' data-prix_standard='" + data.prix_standard + "' data-lot_reaprvs='" + data.lot_reaprvs + "' data-stock_min='" + data.stock_min + "' data-stock_max='" + data.stock_max + "'><i class='fa fa-eye'></i></span> <span class='edit-modal btn btn-sm btn-outline-warning' data-reference='" + data.reference + "' data-designation='" + data.designation + "' data-nomenclature='" + data.nomenclature + "' data-type='" + data.type + "' data-unite='" + data.unite + "' data-delai_semaine='" + data.delai_semaine + "' data-prix_standard='" + data.prix_standard + "' data-lot_reaprvs='" + data.lot_reaprvs + "' data-stock_min='" + data.stock_min + "' data-stock_max='" + data.stock_max + "'><i class='fa fa-pencil'></i></span><span class='delete-modal btn btn-sm btn-outline-danger' data-reference='" + data.reference + "' data-designation='" + data.designation + "' data-nomenclature='" + data.nomenclature + "' data-type='" + data.type + "' data-unite='" + data.unite + "' data-delai_semaine='" + data.delai_semaine + "' data-prix_standard='" + data.prix_standard + "' data-lot_reaprvs='" + data.lot_reaprvs + "' data-stock_min='" + data.stock_min + "' data-stock_max='" + data.stock_max + "'><i class='fa fa-trash-o'></i></span></td></tr>");

                        
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: 'stocks',
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


         // Show stocks
         $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('');
            $('#reference_show').val($(this).data('reference'));
            $('#designation_show').val($(this).data('designation'));
            $('#nomenclature_show').val($(this).data('nomenclature'));
            $('#type_show').val($(this).data('type'));
            $('#unite_show').val($(this).data('unite'));
            $('#delai_semaine_show').val($(this).data('delai_semaine'));
            $('#prix_standard_show').val($(this).data('prix_standard'));
            $('#lot_reaprvs_show').val($(this).data('lot_reaprvs'));
            $('#stock_min_show').val($(this).data('stock_min'));
            $('#stock_max_show').val($(this).data('stock_max'));
            $('#showModal').modal('show');
        });


        // Edit stocks
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('');
            $('#id_edit').val($(this).data('id'));
            $('#reference_edit').val($(this).data('reference'));
            $('#designation_edit').val($(this).data('designation'));
            $('#nomenclature_edit').val($(this).data('nomenclature'));
            $('#type_edit').val($(this).data('type'));
            $('#unite_edit').val($(this).data('unite'));
            $('#delai_semaine_edit').val($(this).data('delai_semaine'));
            $('#prix_standard_edit').val($(this).data('prix_standard'));
            $('#lot_reaprvs_edit').val($(this).data('lot_reaprvs'));
            $('#stock_min_edit').val($(this).data('stock_min'));
            $('#stock_max_edit').val($(this).data('stock_max'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'stocks/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id").val(),
                    'reference': $("#reference_edit").val(),
                    'designation': $('#designation_edit').val(),
                    'nomenclature': $('#nomenclature_edit').val(),
                    'type': $('#type_edit').val(),
                    'unite': $('#unite_edit').val(),
                    'delai_semaine': $('#delai_semaine_edit').val(),
                    'prix_standard': $('#prix_standard_edit').val(),
                    'lot_reaprvs': $('#lot_reaprvs_edit').val(),
                    'stock_min': $('#stock_min_edit').val(),
                    'stock_max': $('#stock_max_edit').val(),
                },
                success: function(data) {
                    
                    toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.reference + "</td><td>" + data.designation + "</td><td>" + data.nomenclature + "</td><td>" + data.type + "</td><td>" + data.unite + "</td><td><span class='show-modal btn btn-sm btn-outline-success' data-reference='" + data.reference + "' data-designation='" + data.designation + "' data-nomenclature='" + data.nomenclature + "' data-type='" + data.type + "' data-unite='" + data.unite + "' data-delai_semaine='" + data.delai_semaine + "' data-prix_standard='" + data.prix_standard + "' data-lot_reaprvs='" + data.lot_reaprvs + "' data-stock_min='" + data.stock_min + "' data-stock_max='" + data.stock_max + "'><i class='fa fa-eye'></i></span> <span class='edit-modal btn btn-sm btn-outline-warning' data-reference='" + data.reference + "' data-designation='" + data.designation + "' data-nomenclature='" + data.nomenclature + "' data-type='" + data.type + "' data-unite='" + data.unite + "' data-delai_semaine='" + data.delai_semaine + "' data-prix_standard='" + data.prix_standard + "' data-lot_reaprvs='" + data.lot_reaprvs + "' data-stock_min='" + data.stock_min + "' data-stock_max='" + data.stock_max + "'><i class='fa fa-pencil'></i></span> <span class='delete-modal btn btn-sm btn-outline-danger'  data-reference='" + data.reference + "' data-designation='" + data.designation + "' data-nomenclature='" + data.nomenclature + "' data-type='" + data.type + "' data-unite='" + data.unite + "' data-delai_semaine='" + data.delai_semaine + "' data-prix_standard='" + data.prix_standard + "' data-lot_reaprvs='" + data.lot_reaprvs + "' data-stock_min='" + data.stock_min + "' data-stock_max='" + data.stock_max + "'><i class='fa fa-trash-o'></i></span></td></tr>");
                        
                    
                }
            });
        });

        // delete stocks
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
                url: 'stocks/' + id,
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