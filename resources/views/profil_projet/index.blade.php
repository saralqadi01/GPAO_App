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


                    <!--<button class="btn btn-outline-info" onclick="javascript:refresh();" title="Rafraichir" type="button">
									<span class="fa fa-refresh"></span>
					</button>-->
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
                                <strong class="card-title">Projet</strong>
                            </div>
                            <div class="card-body">
                                <table id="ProjetsTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom projet</th>
                                            <th>Client</th>
                                            <th>Date début</th>
                                            <th>Date fin</th>
                                            
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    @foreach($produits as $produit )
                                        <tr>
                                            <td>{{ $produit->libelle }}</td>
                                            <td>{{ $produit->client_id }}</td>
                                            <td>{{ $produit->date_debut }}</td>
                                            <td>{{ $produit->date_fin }}</td>
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

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ordre de fabrication</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <button class="button button1" data-toggle="modal" data-target="#addModalOF">Ajouter</button>

                                    <thead>
                                        <tr>
                                            <th>Libéllé</th>
                                            <th>Projet</th>
                                            <th>Commentaire</th>
                                            <th>Action</th>
                                        </tr>
                                        {{ csrf_field() }}
                                    </thead>
                                    <tbody>
                                         @foreach($ordre_fabrications as $ordre_fabrication )
                                        <tr class="item{{$ordre_fabrication->id}}">
                                            <td>{{ $ordre_fabrication->libelle }}</td>

                                            @foreach($produits as $produit)
                                            @if($ordre_fabrication->produit_id == $produit->id)
                                            <td>{{ $produit->libelle }}</td>
                                            @endif
                                            @endforeach
                                            
                                            <td>{{ $ordre_fabrication->commentaie }}</td>
                                            <td>

                                            <a href="" class="ng-scope">
                                            <span class="show-modal btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn-outline-success" data-target="#showModalOF" data-toggle="modal" data-placement="top" title="" data-original-title="Consulter" data-libelle="{{$ordre_fabrication->libelle}}" data-produit_id="{{$ordre_fabrication->produit_id}}" data-commentaie="{{$ordre_fabrication->commentaie}}">
                                            <i class="fa fa-eye"></i>
                                            </span>
                                            </a>

                                            <a href="#" class="ng-scope">
                                            <span class="edit-modal btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn-outline-warning" data-toggle="modal" data-placement="top" title="" data-original-title="Modifier" data-target="#editModalOF" data-id="{{$ordre_fabrication->id}}" data-libelle="{{$ordre_fabrication->libelle}}" data-produit_id="{{$ordre_fabrication->produit_id}}" data-commentaie="{{$ordre_fabrication->commentaie}}">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </span>
                                            </a>

                                            <a href="#" class="ng-scope">
                                            <span data-toggle="modal" data-target="#deleteModalOF" class="delete-modal btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn-outline-danger" data-toggle="modal" data-placement="top" title="" data-original-title="Supprimer" data-id="{{$ordre_fabrication->id}}" data-libelle="{{$ordre_fabrication->libelle}}" data-produit_id="{{$ordre_fabrication->produit_id}}" data-commentaie="{{$ordre_fabrication->commentaie}}">
                                                <i class="fa fa-trash-o"></i>
                                            </span>
                                            </a>
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

<!-- Modal form to add OF -->
<div id="addModalOF" class="modal fade" role="dialog">
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
                            <label for="text-input" class="form-control-label">Libelle:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="libelle_add" placeholder="Text" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Projet:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <select name="select" id="produit_id_add" class="form-control">
                            @foreach($produits as $produit)
                                <option value="{{$produit->id}}" selected>{{$produit->libelle}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Commentaire:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="commentaie_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="button button1 add" data-dismiss="modal">Add</button>
                        <button type="button" class="button4 button1" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- End Modal form to add OF -->

<!-- Modal form to show OF -->
<div id="showModalOF" class="modal fade" role="dialog">
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
                            <label class="control-label col-sm-2" for="libelle">Libéllé:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="libelle_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="commentaie">Commentaire:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <textarea class="form-control" id="commentaie_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>
                        
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="button4 button1" data-dismiss="modal"></span>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to show OF -->

<!-- Modal form to edit OF -->
<div id="editModalOF" class="modal fade" role="dialog">
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
                            <label for="text-input" class="form-control-label">Libéllé:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="libelle_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Projet:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <input type="text" id="libelle_add" placeholder="Text" class="form-control">
                        </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Commentaire:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="commentaie_edit">
                            </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="button button1  edit" data-dismiss="modal"> Edit</button>
                        <button type="button" class="button4 button1 " data-dismiss="modal">Close</button>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to edit OF -->

<!-- Modal form to delete OF -->
<div id="deleteModalOF" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following Orde de fabrication?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        
                    <div class="row form-group">
                            
                            <div class="col-sm-0">
                                <input type="hidden" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="libelle">Libéllé:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="libelle_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="button3 button1 delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="button4 button1" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to delete OF -->

<!-- Operation Table -->     
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <strong class="card-title">Operation</strong>
                            </div>
                            <div class="card-body">
                                <table id="operationsTable" class="table table-striped table-bordered">
                                <button class="button button1" data-toggle="modal" data-target="#addModalOperation">Ajouter</button>
                                    <thead>
                                        <tr>
                                            <th>Operation</th>
                                            
                                            <th>Nom opération</th>
                                            <th>Atelier</th>
                                            <th>Numéro de poste de charge</th>
                                            <th>Commentaire</th>
                                            <th>Action</th>
                                        </tr>
                                        {{ csrf_field() }}      
                                    </thead>
                                    <tbody>
                                        @foreach($operations as $operation )
                                        <tr class="item{{$operation->id}}">
                                            <td>{{ $operation->num_operation}}</td>

                                            @foreach($ateliers as $atelier)
                                            @if($atelier->atelier_id == $atelier->id)
                                            <td>{{ $atelier->libelle }}</td>
                                            @endif
                                            @endforeach

                                            <td>{{ $operation->libelle_operation}}</td>
                                            <td>{{ $operation->num_poste_charge}}</td>
                                            <td>{{ $operation->commentaire}}</td>
                                            <td>
                                            <span class="show-modal btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn-outline-success" data-target="#showModalOperation" data-toggle="modal" data-placement="top" title="" data-original-title="Consulter" data-num_operation="{{$operation->num_operation}}" data-produit_id="{{$operation->produit_id}}" data-atelier_id="{{$operation->atelier_id}}" data-libelle_operation="{{$operation->libelle_operation}}" data-num_poste_charge="{{$operation->num_poste_charge}}" data-temps_preparation="{{$operation->temps_preparation}}" data-temps_execution="{{$operation->temps_execution}}" data-temps_transfert="{{$operation->temps_transfert}}" data-h_debut="{{$operation->h_debut}}" data-h_fin="{{$operation->h_fin}}" data-commentaire="{{$operation->commentaire}}">
                                            <i class="fa fa-eye"></i>
                                            </span>

                                            <span class="edit-modal btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn-outline-warning" data-target="#editModalOperation" data-toggle="modal" data-placement="top" title="" data-original-title="Modifier" data-id="{{$operation->id}}" data-num_operation="{{$operation->num_operation}}" data-produit_id="{{$operation->produit_id}}" data-atelier_id="{{$operation->atelier_id}}" data-libelle_operation="{{$operation->libelle_operation}}" data-num_poste_charge="{{$operation->num_poste_charge}}" data-temps_preparation="{{$operation->temps_preparation}}" data-temps_execution="{{$operation->temps_execution}}" data-temps_transfert="{{$operation->temps_transfert}}" data-h_debut="{{$operation->h_debut}}" data-h_fin="{{$operation->h_fin}}" data-commentaire="{{$operation->commentaire}}">
                                                <i class="fa fa-pencil"></i>
                                            </span>


                                            <span data-toggle="modal" data-target="#deleteModal" class="delete-modal btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" data-id="{{$operation->id}}" data-num_operation="{{$operation->num_operation}}" data-produit_id="{{$operation->produit_id}}" data-atelier_id="{{$operation->atelier_id}}" data-libelle_operation="{{$operation->libelle_operation}}" data-num_poste_charge="{{$operation->num_poste_charge}}" data-temps_preparation="{{$operation->temps_preparation}}" data-temps_execution="{{$operation->temps_execution}}" data-temps_transfert="{{$operation->temps_transfert}}" data-h_debut="{{$operation->h_debut}}" data-h_fin="{{$operation->h_fin}}" data-commentaire="{{$operation->commentaire}}">
                                                <i class="fa fa-trash-o"></i>
                                            </span>
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
<!-- End Operation Table -->


<!-- Modal form to add Operation -->
<div id="addModalOperation" class="modal fade" role="dialog">
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
                            <label for="text-input" class="form-control-label">Numéro d'Opération:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="num_operation_add" placeholder="Text" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Produit:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <select name="select" id="produit_id_add" class="form-control">
                            @foreach($produits as $produit)
                                <option value="{{$produit->id}}">{{$produit->libelle}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Atelier:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <select name="select" id="atelier_id_add" class="form-control">
                            @foreach($ateliers as $atelier)
                                <option value="{{$atelier->id}}">{{$atelier->libelle}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Libéllé d'Opération:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="libelle_operation_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Numéro de poste de charge:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="num_poste_charge_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Temps de préparation:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="time" id="temps_preparation_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Temps d'éxecution:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="time" id="temps_execution_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Temps de transfert:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="time" id="temps_transfert_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Heure début:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="time" id="h_debut_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Heure fin:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="time" id="h_fin_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Commentaire:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="commentaire_add" placeholder="Text" class="form-control">
                        </div>
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="button button1 add" data-dismiss="modal">Add</button>
                        <button type="button" class="button4 button1" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- End Modal form to add Operation -->

<!-- Modal form to show Operation -->
<div id="showModalOperation" class="modal fade" role="dialog">
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
                            <label class="control-label col-sm-2" for="num_operation">Numéro d'Opération:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="num_operation_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="libelle_operation">Libéllé d'opération:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="libelle_operation_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Atelier:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <select name="select" id="atelier_id_add" class="form-control" disabled>
                            @foreach($ateliers as $atelier)
                                <option value="{{$atelier->id}}">{{$atelier->libelle}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="num_poste_charge">Numéro poste de charge:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="num_poste_charge_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="temps_preparation">Temps de préparation:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="temps_preparation_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="temps_execution">Temps d'éxecution:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="temps_execution_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="temps_transfert">Temps de transfert:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="temps_transfert_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="h_debut">Heure début:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="h_debut_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="h_fin">Heure fin:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <input type="name" class="form-control" id="h_fin_show" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="control-label col-sm-2" for="commentaire">Commentaire:</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <textarea class="form-control" id="commentaire_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>
                        
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="button4 button1" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to show a Operation -->

<!-- Modal form to edit a Operation -->
<div id="editModalOperation" class="modal fade" role="dialog">
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
                            <label for="text-input" class="form-control-label">Numéro d'opération:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="num_operation_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Libélle d'opération:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="libelle_operation_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Projet:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <input type="text" id="libelle_operation_add" placeholder="Text" class="form-control">

                        </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Atelier:</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <select name="select" id="atelier_id_edit" class="form-control">
                            @foreach($ateliers as $atelier)
                                <option value="{{$atelier->id}}">{{$atelier->libelle}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Numéro de poste de charge:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="num_poste_charge_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Temps de préparation:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="temps_preparation_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Temps d'éxecution:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="temps_execution_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Temps de transfert:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="temps_transfert_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Heure début:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="h_debut_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Heure fin:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="h_fin_edit">
                            </div>
                        </div>

                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Commentaire:</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="commentaire_edit">
                            </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="button button1  edit" data-dismiss="modal">Edit</button>
                        <button type="button" class="button4 button1 " data-dismiss="modal">Close</button>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to edit Operation -->

<!-- Modal form to delete Operation -->
<div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following Opération?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        
                    <div class="row form-group">
                            
                            <div class="col-sm-0">
                                <input type="hidden" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="libelle_operation">Libéllé d'opération:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="libelle_operation_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="button3 button1 delete" data-dismiss="modal">Delete</button>
                        <button type="button" class="button4 button1" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal form to delete a Operation -->


    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <!--<script src="{{ asset('assets/js/main.js') }}"></script>-->



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
        $('#operationsTable').removeAttr('style');
    })
</script>

<script>
    $(window).load(function(){
        $('#bootstrap-data-table-export').removeAttr('style');
    })
</script>

    <!-- ************Operations*********** -->
    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        
        // Show Operation
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('');
            $('#num_operation_show').val($(this).data('num_operation'));
            $('#produit_id_show').val($(this).data('produit_id'));
            $('#atelier_id_show').val($(this).data('atelier_id'));
            $('#num_poste_charge_show').val($(this).data('num_poste_charge'));
            $('#temps_preparation_show').val($(this).data('temps_preparation'));
            $('#temps_execution_show').val($(this).data('temps_execution'));
            $('#temps_transfert_show').val($(this).data('temps_transfert'));
            $('#libelle_operation_show').val($(this).data('libelle_operation'));
            $('#h_debut_show').val($(this).data('h_debut'));
            $('#h_fin_show').val($(this).data('h_fin'));
            $('#commentaire_show').val($(this).data('commentaire'));
            $('#showModal').modal('show');
        });


        // add a new Operation
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'profil_projet',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'num_operation': $('#num_operation_add').val(),
                    'produit_id': $('#produit_id_add').val(),
                    'atelier_id': $('#atelier_id_add').val(),
                    'num_poste_charge': $('#num_poste_charge_add').val(),
                    'temps_preparation': $('#temps_preparation_add').val(),
                    'temps_execution': $('#temps_execution_add').val(),
                    'temps_transfert': $('#temps_transfert_add').val(),
                    'libelle_operation': $('#libelle_operation_add').val(),
                    'h_debut': $('#h_debut_add').val(),
                    'h_fin': $('#h_fin_add').val(),
                    'commentaire': $('#commentaire_add').val(),
                },
                success: function(data) {

                     
                        toastr.success('Successfully added Client!', 'Success Alert', {timeOut: 5000});
                        $('#operationsTable').append("<tr class='item" + data.id + "'><td>" + data.num_poste_charge + "</td><td>" + data.produit_id + "</td><td>" + data.atelier_id + "</td><td>" + data.libelle_operation + "</td><td>" + data.commentaire + "</td><td><button class='show-modal button button1' data-num_operation='" + data.num_operation + "' data-produit_id='" + data.produit_id + "' data-atelier_id='" + data.atelier_id + "' data-libelle_operation='" + data.libelle_operation + "' data-num_poste_charge='" + data.num_poste_charge + "' data-commentaire='" + data.commentaire + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal button2 button1' data-num_operation='" + data.num_operation + "' data-produit_id='" + data.produit_id + "' data-atelier_id='" + data.atelier_id + "' data-libelle_operation='" + data.libelle_operation + "' data-num_poste_charge='" + data.num_poste_charge + "' data-commentaire='" + data.commentaire + "'><span class='glyphicon glyphicon-edit'></span> Edit</button><button class='delete-modal button3 button1' data-num_operation='" + data.num_operation + "' data-produit_id='" + data.produit_id + "' data-atelier_id='" + data.atelier_id + "' data-libelle_operation='" + data.libelle_operation + "' data-num_poste_charge='" + data.num_poste_charge + "' data-commentaire='" + data.commentaire + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                        
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: 'profil_projet',
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


        // Edit Operation
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('');
            $('#id_edit').val($(this).data('id'));
            $('#num_operation_edit').val($(this).data('num_operation'));
            $('#produit_id_edit').val($(this).data('produit_id'));
            $('#atelier_id_edit').val($(this).data('atelier_id'));
            $('#num_poste_charge_edit').val($(this).data('num_poste_charge'));
            $('#temps_preparation_edit').val($(this).data('temps_preparation'));
            $('#temps_execution_edit').val($(this).data('temps_execution'));
            $('#temps_transfert_edit').val($(this).data('temps_transfert'));
            $('#libelle_operation_edit').val($(this).data('libelle_operation'));
            $('#h_debut_edit').val($(this).data('h_debut'));
            $('#h_fin_edit').val($(this).data('h_fin'));
            $('#commentaire_edit').val($(this).data('commentaire'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'profil_projet/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id").val(),
                    'num_operation': $("#num_operation_edit").val(),
                    'produit_id': $("#produit_id_edit").val(),
                    'atelier_id': $("#atelier_id_edit").val(),
                    'num_poste_charge': $('#num_poste_charge_edit').val(),
                    'temps_preparation': $('#temps_preparation_edit').val(),
                    'temps_execution': $('#temps_execution_edit').val(),
                    'temps_transfert': $('#temps_transfert_edit').val(),
                    'libelle_operation': $('#libelle_operation_edit').val(),
                    'h_debut': $('#h_debut_edit').val(),
                    'h_fin': $('#h_fin_edit').val(),
                    'commentaire': $('#commentaire_edit').val(),
                },
                success: function(data) {
                    
                    toastr.success('Successfully updated Operation!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.num_operation + "</td><td>" + data.produit_id + "</td><td>" + data.atelier_id + "</td><td>" + data.libelle_operation + "</td><td>" + data.num_poste_charge + "</td><td>" + data.commentaire + "</td><td><button class='show-modal button button1' data-num_operation='" + data.num_operation + "' data-produit_id='" + data.produit_id + "' data-atelier_id='" + data.atelier_id + "' data-libelle_operation='" + data.libelle_operation + "' data-num_poste_charge='" + data.num_poste_charge + "' data-commentaire='" + data.commentaire + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal button2 button1' data-num_operation='" + data.num_operation + "' data-produit_id='" + data.produit_id + "' data-atelier_id='" + data.atelier_id + "' data-libelle_operation='" + data.libelle_operation + "' data-num_poste_charge='" + data.num_poste_charge + "' data-commentaire='" + data.commentaire + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                        
                    
                }
            });
        });

        // delete Operation
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('');
            $('#id_delete').val($(this).data('id'));
            $('#libelle_operation_delete').val($(this).data('libelle_operation'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'profil_projet/' + id,
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

        <!-- ************OF*********** -->
        <!-- AJAX CRUD operations -->
        <script type="text/javascript">

        // Show OF
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('');
            $('#libelle_show').val($(this).data('libelle'));
            $('#produit_id_show').val($(this).data('produit_id'));
            $('#commentaie_show').val($(this).data('commentaie'));
            $('#showModalOF').modal('show');
        });


        // add a new OF
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'profil_projetO',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'libelle': $('#libelle_add').val(),
                    'produit_id': $('#produit_id_add').val(),
                    'commentaie': $('#commentaie_add').val(),
                },
                success: function(data) {

                     
                        toastr.success('Successfully added Ordre de fabrication!', 'Success Alert', {timeOut: 5000});
                        $('#bootstrap-data-table-export').append("<tr class='item" + data.id + "'><td>" + data.libelle + "</td><td>" + data.produit_id + "</td><td>" + data.commentaie + "</td><td><button class='show-modal btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn-outline-success' data-libelle='" + data.libelle + "' data-produit_id='" + data.produit_id + "' data-commentaie='" + data.commentaie + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal button2 button1' data-libelle='" + data.libelle + "' data-produit_id='" + data.produit_id + "' data-commentaie='" + data.commentaie + "'><span class='glyphicon glyphicon-edit'></span> Edit</button><button class='delete-modal button3 button1' data-libelle='" + data.libelle + "' data-produit_id='" + data.produit_id + "' data-commentaie='" + data.commentaie + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                        
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: 'profil_projetO',
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


        // Edit OF
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('');
            $('#id_edit').val($(this).data('id'));
            $('#libelle_edit').val($(this).data('libelle'));
            $('#produit_id_edit').val($(this).data('produit_id'));
            $('#commentaie_edit').val($(this).data('commentaie'));
            id = $('#id_edit').val();
            $('#editModalOF').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'profil_projetO/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id").val(),
                    'libelle': $("#libelle_edit").val(),
                    'produit_id': $("#produit_id_edit").val(),
                    'commentaie': $('#commentaie_edit').val(),
                },
                success: function(data) {
                    
                    toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.libelle + "</td><td>" + data.produit_id + "</td><td>" + data.commentaie + "</td><td><button class='show-modal btn btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x btn-outline-success' data-libelle='" + data.libelle + "' data-produits_id='" + data.produits_id + "' data-commentaie='" + data.commentaie + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal button2 button1' data-libelle='" + data.libelle + "' data-produits_id='" + data.produits_id + "' data-commentaie='" + data.commentaie + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal button3 button1' data-libelle='" + data.libelle + "' data-produits_id='" + data.produits_id + "' data-commentaie='" + data.commentaie + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                        
                    
                }
            });
        });

        // delete OF
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('');
            $('#id_delete').val($(this).data('id'));
            $('#libelle_delete').val($(this).data('libelle'));
            $('#deleteModalOF').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'profil_projetO/' + id,
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