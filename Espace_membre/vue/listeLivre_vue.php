<html>

<head>
    <title>Liste des Livres | Atlas Livre</title>
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
    <section class="container" id="princi" style="margin-bottom:50px;">
        <article>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="accueil_controleur.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste des livres</li>
                </ol>
            </nav>
        </article>
        <!-- Choix de l'affichage -->
        <div class="row">
            <h1 class="col-sm-6">Liste des livres :</h1>
            <div class="col-sm-3  offset-sm-3" style="margin-top:10px;">
                <select id="select" class="form-control" onChange="location = this.options[this.selectedIndex].value;">
                    <option id=1 value="listeLivre_controleur.php?ch=1"><a href="liste_controle.php?choix=1">Tout les livres.</a></option>
                    <option id=2 value="listeLivre_controleur.php?" selected>Par catégorie.</option>
                    <option id=3 value="listeLivre_controleur.php?ch=3">Prix croissant.</option>
                    <option id=4 value="listeLivre_controleur.php?ch=4">Prix decroissant.</option>
                    <option id=5 value="listeLivre_controleur.php?ch=5">Par classement.</option>
                    <option id=6 value="listeLivre_controleur.php?ch=6">Promotions.</option>
                </select>
            </div>
        </div>
        <!-- Pour les categories -->
        <?php if(!isset($_GET['ch']) or $_GET['ch'] >6 or ((int) $_GET['ch'] <= 0)  ){ ?>
        <div class="row offset-sm-1">
            <?php 
            $cats=get_cat(0,9);
            while($cat=$cats->fetch()){
            ?>
            <div class="col-sm-3 rounded img_cat" style="background-image:url('../../images/cat/<?php echo $cat['cat']; ?>.jpg'); margin : 10px; color:#fff">
                <div class="row ">
                    <div class="rounded catText float-right col-sm-12">
                        <h3><?php echo $cat['cat']; ?></h3>
                        <p><?php include('../autre/text_cat.php'); ?></p>
                        <a class="btn btn-primary" href="cat_controleur.php?cat=<?php echo $cat['cat']; ?>">Voir</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- Pour les livres -->
        <?php } else if (isset($_GET['ch']) and $_GET['ch']!=6) {?>
        <div class="row" style="margin-top:20px;">
            <?php 
                    while($livre=$livres->fetch()){
                ?>
            <div class="col-sm-3" id="livres" style="margin-top:20px;">
                <p id="img_livre"><a href="livre_controleur.php?livre=<?php echo $livre['id']; ?>"><img src="../../images/livres/<?php echo $livre['image']; ?>" width=120 /></a></p>
                <a href="livre_controleur.php?livre=<?php echo $livre['id']; ?>">
                    <p id="img_text"><?php echo $livre['titre']; ?><br><span style="font-size:12px;">par : <?php echo $livre['auteur']; ?></span></p>
                </a>
                <p style="text-align:center; font-wight:bold;">
                    <strong>
                        <?php if($livre['promo']==0){ ?>
                        <?php echo $livre['p_ach']; ?> <sup>DA</sup>
                        <?php
                            }else{
                                echo '<span style="text-decoration: line-through; color:red;">'.$livre['p_ach'].'<sup>DA</sup></span> ';
                                $promo=recherche_promo($livre['promo']);
                                $pr= (int) ($livre['p_ach'] - ($livre['p_ach']*$promo['pr']/100));
                                echo $pr.'<sup>DA</sup>';
                            }
                        ?>
                        <br><span style="font-size:12px;"><?php echo $livre['p_loc']; ?><sup>DA</sup> location</span>
                    </strong>
                </p>
                <p style="text-align:center;"><a class="btn btn-warning" href="panier_controleur.php?add=<?php echo $livre['id']; ?>" style="color:white"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                    <p>
            </div>
            <?php } ?>
            <?php if($nb>=1){ ?>
            <nav aria-label="Page navigiation example" class="col-xl-7 offset-xl-5" style="margin-top:50px;">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="listeLivre_controleur.php?page=<?php echo $nP-1; if(isset($_GET['ch'])){ echo '&ch='.$_GET['ch'];} ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php for($i=0 ; $i<=$nb ; $i++ ){ ?>
                    <li class="page-item"><a class="page-link" href="listeLivre_controleur.php?page=<?php echo $i; if(isset($_GET['ch'])){ echo '&ch='.$_GET['ch'];} ?>"><?php echo $i+1; ?></a></li>
                    <?php  } ?>
                    <li class="page-item">
                        <a class="page-link" href="listeLivre_controleur.php?page=<?php echo $nP+1; if(isset($_GET['ch'])){ echo '&ch='.$_GET['ch'];} ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php } ?>
        </div>
        <!-- Pour les promotions -->
        <?php }else{ ?>
        <div class="row offset-sm-1">
            <?php 
            $promos=get_promotion(0,10);
            while($promo=$promos->fetch()){
            ?>
            <div class="col-sm-3 rounded " style="background-image:url('../../images/promotion/<?php echo $promo['image']; ?>'); margin : 10px; color:#fff; background-size:100%;">
                <div class="row ">
                    <div class="rounded catText float-right col-sm-12">
                        <h3><?php echo $promo['titre']; ?></h3>
                        <a class="btn btn-primary" href="promotion_controleur.php?promo=<?php echo $promo['id']; ?>">Voir</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
    <script>
        <?php if(isset($_GET['ch'])){ ?>
        $('#<?php echo $_GET['ch']; ?>').attr("selected", "");
        <?php } ?>

    </script>


</body>

</html>
