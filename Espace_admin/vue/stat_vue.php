<html>

<head>
    <title>Tableau de bord</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link href="../../css/style_admin.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/49adf9d8a8.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("../autre/menu.php"); ?>

    <section class="container-fluid col-lg-10 offset-lg-2 col-md-9 offset-md-3" id='princi'>
        <div class="row">
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-chart-line"></i> Statistiques :</h1>
        </div>
        <article>
            <div class="row">
                <div class="col-sm-6" style="text-align:center">
                    <h3>Aujourd’hui : </h3>
                    <?php echo date('d/m/Y');?>
                    <p>
                        <span style="font-size:200px;"><?php echo getNbComDate(date('Y-m-d')); ?></span> commandes.
                        <span style="font-size:200px;"><?php echo getNbvisiteDate(date('Y-m-d')); ?></span> visiteurs. <br>
                    </p>
                </div>
                <div class="col-sm-6" id="graph">
                    <canvas id="myChart" width="50" height="50"></canvas>
                </div>
                <!--
                <div class="col-sm-6">
                    <canvas id="myChart2" width="50" height="50"></canvas>
                </div>
                -->
            </div>
            <script src="../../css/Chart.min.js"></script>
            <script>
                Chart.defaults.global.title.display = true;
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: [
                            <?php 
                            for($i=6;$i>=0;$i--){ 
                                echo '\''.date('d-m-Y', (time()-$i*(60*60*24))).'\',';
                            } ?>
                        ],
                        datasets: [{
                                label: ['Nombre de commandes'],
                                backgroundColor: 'transparent ',
                                borderColor: '#007bff',
                                data: [
                                    <?php 
                                    for($i=6;$i>=0;$i--){ 
                                        $nb=getNbComDate(date('Y-m-d', (time()-$i*(60*60*24)))); 
                                        echo $nb.',';
                                    }
                                    ?> 0
                                ],
                                fill: false,
                            },
                            {
                                label: ["Nombre de visiteurs"],
                                backgroundColor: 'transparent ',
                                borderColor: ' #FFA500',
                                data: [
                                    <?php 
                                    for($i=6;$i>=0;$i--){ 
                                        $nb1=getNbvisiteDate(date('Y-m-d', (time()-$i*(60*60*24)))); 
                                        echo $nb1.',';
                                    }
                                    ?> 0
                                ]
                            }
                        ]
                    },

                    // Configuration options go here
                    options: {
                        title: {
                            text: "Statistiques de ses 6 derniers jours"
                        },
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }
                    }
                });

            </script>

            <script>
                Chart.defaults.global.title.display = true;
                var ctx = document.getElementById('myChart2').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'doughnut',

                    // The data for our dataset
                    data: {
                        labels: ['1er', '2eme', '3eme'],
                        datasets: [{
                            label: ['Nombre de commandes'],
                            backgroundColor: ['#ffd700 ', '#c0c0c0', '#614e1a'],
                            hoverBackgroundColor: ['#ffd700 ', '#c0c0c0', '#614e1a'],
                            borderColor: '#fff',
                            data: [9, 7, 5]
                        }]
                    },

                    // Configuration options go here
                    options: {
                        title: {
                            text: "Classement des livres"
                        }
                    }
                });

            </script>
        </article>
    </section>
</body>

</html>
