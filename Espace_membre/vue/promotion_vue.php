<html>

<head>
    <title><?php echo $promo['titre']; ?> | Atlas Livre</title>
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
                    <li class="breadcrumb-item"><a href="listeLivre_controleur.php">Liste des livres</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $promo['titre']; ?></li>
                </ol>
            </nav>
        </article>
        <article>

        </article>
        <h1 style="text-align:center"><?php echo $promo['slogan']; ?></h1>
        <article>
            <h3 style="margin-bottom:30px;">Livre concerné :<span class="offset-sm-8"
                    style="color:red;">-<?php echo $promo['pr']; ?>%</span> </h3>
            <div class="row">
                <?php 
                while($livre=$livres->fetch()){
                ?>
                <div class="col-sm-3" id="livres" style="margin-top:20px;">
                    <p id="img_livre"><a href="livre_controleur.php?livre=<?php echo $livre['id']; ?>"><img
                                src="../../images/livres/<?php echo $livre['image']; ?>" width=120 /></a></p>
                    <a href="livre_controleur.php?livre=<?php echo $livre['id']; ?>">
                        <p id="img_text"><?php echo $livre['titre']; ?><br><span style="font-size:12px;">par :
                                <?php echo $livre['auteur']; ?></span></p>
                    </a>
                    <p style="text-align:center; font-wight:bold;">
                        <strong>
                            <?php if($livre['promo']==0){ ?>
                            <?php echo $livre['p_ach']; ?> <sup>DA</sup>
                            <?php }else{ ?>
                            <?php
                                echo '<span style="text-decoration: line-through; color:red;">'.$livre['p_ach'].'<sup>DA</sup></span> ';
                                $promo=recherche_promo($livre['promo']);
                                $pr= (int) ($livre['p_ach'] - ($livre['p_ach']*$promo['pr']/100));
                                echo $pr.'<sup>DA</sup>';
                            }
                            ?>
                            <br><span style="font-size:12px;"><?php echo $livre['p_loc']; ?><sup>DA</sup>
                                location</span>
                        </strong>
                    </p>
                    <p style="text-align:center;"><a class="btn btn-warning"
                            href="panier_controleur.php?add=<?php echo $livre['id']; ?>" style="color:white"><i
                                class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                        <p>
                </div>
                <?php } ?>
            </div>
        </article>

    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>