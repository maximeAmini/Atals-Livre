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
        <h1 style="margin-bottom:20px;"><i class="fas fa-home"></i> Tableau de bord</h1>
        <article>
            <article class="jumbotron" style="padding-top:15px;padding-bottom:15px;">
                <h3 style="margin-bottom:20px;"><i class="fas fa-eye"></i> D'un coup d'oeil :</h3>
                <div class="row">
                    <p class="col-sm-6"><i class="fas fa-book"></i> <a href="#"><?php echo nb_livre(); ?> Livres.</a></p>
                    <p class="col-sm-6"><i class="fas fa-shopping-cart"></i> <a href="#"><?php echo nb_commandes(); ?> Commandes.</a></p>
                    <p class="col-sm-6"><i class="fas fa-shipping-fast"></i> <a href="#"><?php echo nb_livr(); ?> Livraisons.</a></p>
                    <p class="col-sm-6"><i class="fas fa-envelope"></i> <a href="#"><?php echo nb_message(); ?> Messages.</a></p>
                </div>
            </article>
            <article class="jumbotron" style="padding-top:15px;padding-bottom:15px;">
                <h3 style="margin-bottom:20px;"><i class="fas fa-grin-alt"></i> Activites :</h3>
                <div class="row col-sm-11 offset-sm-1">
                    <h5><i class="fas fa-shopping-cart"></i> Derniere commandes :</h5>
                    <div class="col-lg-12">
                        <?php
                        $comms=get_com(0);
                        while($comm=$comms->fetch()){
                        ?>
                        <div><i class="fas fa-angle-double-right"></i>
                            <?php echo $comm['titre']; ?> par : <?php echo $comm['nom'].' '.$comm['prenom']; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </article>
        </article>
    </section>
</body>
