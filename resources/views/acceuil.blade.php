@extends('layouts.master')


@section('content')

<!doctype html>


    

    <script>
    var libelle = <?php echo $produit_libelle; ?>;
    var pourcentage = <?php echo $produit_pourcentage; ?>;


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



<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Dashboard</b></div>
                <div class="panel-body">
                <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection

