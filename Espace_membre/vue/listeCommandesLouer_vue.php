<html>

<head>
    <title>Liste des locations | Atlas Livre</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Liste des locations</li>
                </ol>
            </nav>
        </article>
        <!-- Liste des commandes -->
        <article>
            <h1>Livres loués :</h1>
            <div class="row">
                <?php
                $commandes=getComm_louer($_SESSION['id']);
                while($commande=$commandes->fetch()){
                ?>
                <div class="col-sm-3" id="livres" style="margin-top:20px;">
                    <p id="img_livre"><a href="commande_controleur.php?comm=<?php echo $commande['id_comm']; ?>"><img src="../../images/livres/<?php echo $commande['image']; ?>" width=120 /></a></p>
                    <a href="commande_controleur.php?comm=<?php echo $commande['id']; ?>">
                        <p id="img_text"><?php echo $commande['titre']; ?></p>
                    </a>
                    <p style="text-align:center; font-wight:bold;">
                        <strong>
                            <?php
                                echo '<span style="color:#ffc107">location </span>'; 
                                echo $commande['prix'].'<sup>DA</sup>' ;
                            ?>
                            <br>
                            <?php
                                $date = strtotime($commande['dateL']. ' + '.$commande['nb_j'].' days');
                                echo 'Remettre le : '.date('d-m-Y',$date);
                            ?>
                        </strong>
                    </p>
                </div>
                <?php } ?>
            </div>

        </article>

    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
