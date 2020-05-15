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
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-book"></i> Fiche du livre</h1>
        </div>
        <article class="offset-sm-1">
            <div class="row">
                <div class="col-sm-3">
                    <img width="200" src="../../images/livres/<?php echo $livre['image']; ?>" class="rounded" />
                </div>
                <div class="col-sm-6">
                    <h3 style="margin-bottom:20px;"><?php echo $livre['titre']; ?> :</h3>
                    <p><i class="fas fa-angle-double-right"></i><strong> Auteur: </strong><?php echo $livre['auteur']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Catégorie: </strong><?php echo $livre['cat']; ?></p>
                    <p>
                        <i class="fas fa-angle-double-right"></i>
                        <strong> Prix achat/location: </strong>
                        <?php echo $livre['p_ach']; ?><sup>DA</sup> /
                        <?php echo $livre['p_loc']; ?><sup>DA</sup> <?php if($livre['promo']!=0){ echo '<i class="fas fa-gift" style="color:#ff00cc"></i>'; }?>
                    </p>
                    <p>
                        <i class="fas fa-angle-double-right"></i>
                        <strong> Nombre de vente: </strong><span class="badge badge-secondary"><?php echo $livre['nb_v']; ?></span>
                    </p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Disponiblité : </strong><?php echo $livre['dispo']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Discription: </strong></p>
                    <p style="text-align:center;" class="page">
                        <?php 
                    if( strlen($livre['disc'])>80  ){
                        for($i=0 ; $i<=80 ; $i++){
                            echo $livre['disc'][$i];
                        } 
                            echo '<a class="suite" href="#"> Lire la suite...</a>';
                        }
                    else{
                        echo $livre['disc'];
                    }
                    ?>
                    </p>
                </div>
            </div>

        </article>
    </section>
    <script>
        $(".suite").click(function() {
            $.get(
                '../autre/disc.php',
                'id=<?php echo $livre['id']; ?>',
                function rep(texte_recu) {
                    $('.page').html(texte_recu);
                },
                'HTML'
            );
        });

    </script>
</body>

</html>
