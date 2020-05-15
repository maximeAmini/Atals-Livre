<html>

<head>
    <title>Panier | Atlas Livre</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link href="../../css/style.css" rel="stylesheet" />

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
    <!-- Conetenu de la page -->
    <section class="container" id="princi">
        <article>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="accueil_controleur.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Panier</li>
                </ol>
            </nav>
        </article>
        <article>
            <h1 style="margin-bottom:20px;">Panier <span class="badge badge-secondary rounded-circle"><?php echo get_nb_pan($_SESSION['id']); ?></span></h1>
            <?php if( isset($_GET['add']) and $ver){ ?>
            <div class="alert alert-danger col-lg-10 offset-lg-1" style="text-align:center;">
                <p id="message">Ce livre est deja dans votre panier</p>
            </div>
            <?php } ?>
            <div class="row col-sm-11 offset-sm-1" id="pan">
                <?php 
                 while($livre=$panier->fetch()){
                ?>
                <div class='row col-sm-12 jumbotron' style="padding:10px 0px 10px 10px; background-color: rgb(233,236,239,0.5);">
                    <div class="col-sm-12">
                        <a style="font-size:20px; text-decoration: none; color:red;" class="float-right" href="panier_controleur.php?supp=<?php echo $livre['id_pan'] ; ?>">&times;</a>
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <img src="../../images/livres/<?php echo $livre['image']; ?>" width="150" />
                    </div>
                    <div class="col-lg-10 col-sm-8">
                        <h3><a href="livre_controleur.php?livre=<?php echo $livre['id_l']; ?>"><?php echo $livre['titre']; ?></a></h3>
                        <p>Par : <?php echo $livre['auteur']; ?></p>
                        <div class="row">
                            <p class="col-sm-9">
                                <?php if($livre['stock']>0){ ?>
                                <span style="color:#28a745;"><i class="fas fa-check"></i> En stock </span><br />
                                <?php }else{ ?>
                                <span style="color:#dc3545;"><i class="fas fa-times"></i> En Repture </span><br />
                                <?php } ?>
                                <?php if($livre['dispo']=="oui"){ ?>
                                <span style="color:#28a745;"><i class="fas fa-check"></i> Disponible pour la location </span><br />
                                <?php }else{ ?>
                                <span style="color:#dc3545;"><i class="fas fa-times"></i> non disponible pour la location </span><br />
                                <?php } ?>
                            </p>
                            <p class="col-sm-3 text-center" style="font-weight:bold;">
                                <?php if($livre['promo']==0){ ?>
                                <span><span class="badge badge-secondary"><?php echo $livre['p_ach']; ?><sup>DA</sup></span></span>
                                <?php
                                }else{
                                $promo=recherche_promo($livre['promo']);
                                $pr= (int) ($livre['p_ach'] - ($livre['p_ach']*$promo['pr']/100));
                                ?>
                                <span><span style="text-decoration: line-through; color:red;"><?php echo $livre['p_ach']; ?><sup>DA</sup></span> <span class="badge badge-secondary"><?php echo $pr; ?><sup>DA</sup></span></span>
                                <?php } ?>
                                <span class="badge badge-secondary"><?php echo $livre['p_loc']; ?><sup>DA</sup></span>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <a class="btn btn-success navbar-btn float-right" style="margin-right : 10px; color : #fff" <?php 
                        if($livre['dispo']=="non" && $livre['stock']==0){ 
                            echo "disabled"; 
                        } else{ 
                            if(empty(verif($livre['id_l'],$_SESSION['id']))){
                                echo 'data-toggle="modal" data-target="#infos'.$livre['id_pan'].'"';
                            }else{
                                echo 'data-toggle="modal" data-target="#alert_comm'.$livre['id_pan'].'"';
                            }
                        } ?>> Commander le livre</a>
                            <?php 
                            if(empty(verif($livre['id_l'],$_SESSION['id']))){
                                include('../autre/commander.php');
                            }else{
                                include('../autre/alert_livreComm.php');
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </article>

    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>

</body>

</html>
