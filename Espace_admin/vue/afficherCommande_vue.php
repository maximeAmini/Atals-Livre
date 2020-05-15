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
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-shopping-cart"></i> Détail de la commande
                :</h1>
        </div>
        <article class="offset-sm-1">
            <div class="row">
                <div class="col-sm-3">
                    <img width="200" src="../../images/livres/<?php echo $livre['image']; ?>" class="rounded" />
                </div>
                <div class="col-sm-6">
                    <h3 style="margin-bottom:20px;"><a
                            href="afficherLivre_controleur.php?livre=<?php echo $livre['idL'] ?>"><?php echo $livre['titre']; ?>
                            :</a></h3>
                    <p><i class="fas fa-angle-double-right"></i><strong> éffectuer par: </strong><a
                            href="afficherMembre_controleur.php?livre=<?php echo $livre['idM'] ?>"><?php echo $livre['nom'].' '.$livre['prenom']; ?></a>
                    </p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Adress:
                        </strong><?php echo $livre['adress']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Num: </strong><?php echo $livre['num']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> date: </strong><?php echo $livre['date']; ?>
                    </p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Type: </strong><?php echo $livre['etat']; ?>
                    </p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Prix: </strong><?php echo $livre['prix']; ?>
                        (<?php if($livre['etat']=="Acheter"){echo $livre['nb_l']." Livres"; } else {echo $livre['nb_j']." Jours"; }?>)
                        <?php if($livre['promo']!=0){ echo '<i class="fas fa-gift" style="color:#ff00cc"></i>'; }?> </p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Livraison:
                        </strong><?php echo $livre['livraison']; ?></p>
                </div>
            </div>

        </article>
    </section>
</body>

</html>