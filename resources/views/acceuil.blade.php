@extends('layouts.master')


@section('content')

<style>
.center {
  margin: auto;
  width: 50%;
  border: 3px ;
  padding: 70px;
}

</style>

<!doctype html>


    

    <script>
    var libelle = <?php echo $produit_libelle; ?>;
    var pourcentage = <?php echo $produit_pourcentage; ?>;
    var total = <?php echo $produit_total; ?>;


    var barChartData = {
        labels: libelle,
        datasets: [ {
            label: 'Projet',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: pourcentage
        }]
    };

    


    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Avancement des projets'
                },

                scales: {
         yAxes: [{
             ticks: {
                 beginAtZero:true
             }
         }]
     }

                
            }
        });


    };
</script>

@if(Auth::user()->role == "utilisateur")

<!-- <div class="card-body">
    <div class="center">
    <div class="col-md-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Bienvenue!</h4>
            <p>Aww.</p>
        </div> 
        </div>   
        </div>
</div> -->


    <div class="col-md-5">
    <div class="card-body">
    <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Bienvenue!</h4>
        
    </div>
    </div>
@else



<div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Project</div>
                        <div class="stat-digit">{{$produit_total}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Nouveau Projets</div>
                        <div class="stat-digit">{{$produit_new}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Projet en cours</div>
                        <div class="stat-digit">3</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Projet terminé</div>
                        <div class="stat-digit">1</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="card">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
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
                                <strong class="card-title">Liste des ateliers non disponibles</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                
                                    <thead>
                                        <tr>
                                            <th>Nom Atelier</th>
                                            <th>Nom Projet</th>
                                            <th>Nom Opération</th>
                                            <th>Heure début</th>
                                            <th>Heure fin</th>
                                        </tr>
                                        {{ csrf_field() }}
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>atelier02</td>
                                            <td>Projet07</td>
                                            <td>OP02</td>
                                            <td>08:00</td>
                                            <td>12:00</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
            </div><!-- .content -->
    @endif








@endsection

