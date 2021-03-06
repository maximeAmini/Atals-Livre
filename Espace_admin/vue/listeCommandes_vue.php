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
            <h1 style="margin-bottom:20px;" class="col-sm-9"><i class="fas fa-shopping-cart"></i> Commandes</h1>
            <form class="form-inline my-2 my-lg-0 col-sm-3" style="padding-top:10px;" method="get" action="listeCommandes_controleur.php?">
                <div class="input-group mb-2 mr-sm-2">
                    <input type="search" class="form-control" placeholder="Recherche" id="recherche" name="rech">
                    <div class="input-group-prepend">
                        <button type="submit" class="input-group-text" id="logosearch"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <article>
            <div class="row">
                <h3 class=" col-sm-5"><i class="fas fa-list-ul"></i> Liste des commandes :</h3>
                <div class="col-sm-3 offset-sm-4" style="margin-top:10px;">
                    <select id="select" class="form-control" onChange="location = this.options[this.selectedIndex].value;" style="margin-top : -12px;">
                        <option id=1 value="listeCommandes_controleur.php?">Toutes les commandes.</option>
                        <option id=2 value="listeCommandes_controleur.php?c=2">Non livré.</option>
                        <option id=3 value="listeCommandes_controleur.php?c=3">Loué.</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <form method="post" action="listeCommandes_controleur.php">
                    <table class="table table-striped table-condensed ">
                        <tr>
                            <th><input type="checkbox" id="all" onclick="rep();" /></th>
                            <th>Livre commander</th>
                            <th>effectué par</th>
                            <th>Adresse</th>
                            <th>Prix</th>
                            <th>Date</th>
                            <th>Livraison</th>
                        </tr>
                        <?php while($livre=$comms->fetch()){?>
                        <tr>
                            <td><input type="checkbox" name="num[]" value="<?php echo $livre['idC']; ?>" /></td>
                            <td style="width:25%;">
                                <?php echo $livre['titre']; ?><br />
                                <span style="font-size:13px; ">
                                    <a href="afficherCommande_controleur?comm=<?php echo $livre['idC']; ?>">Détail</a>
                                    <a href="#" data-toggle="modal" data-target="#alert_anul<?php echo $livre['idC']; ?>" style="color:#dc3545;">Supprimer</a>
                                    <?php include('../autre/alert_suppComm.php'); ?>
                                </span>
                            </td>
                            <td><?php echo $livre['nom'].' '.$livre['prenom']; ?></td>
                            <td><?php echo $livre['adress']; ?></td>
                            <td><?php echo $livre['prix']; ?></td>
                            <td><?php echo $livre['date']; ?></td>
                            <td><?php echo $livre['livraison']; ?><br />
                                <span style="font-size:13px; ">
                                    <a href="listeCommandes_controleur?oui=<?php echo $livre['idC']; if(isset($_GET['c'])){ echo '&c='.$_GET['c'];} ?>" style="color:#28a745;"><i class="fas fa-check"></i></a>
                                    <a href="listeCommandes_controleur?non=<?php echo $livre['idC']; if(isset($_GET['c'])){ echo '&c='.$_GET['c'];} ?>" style="color:#dc3545;"><i class="fas fa-times"></i></a>
                                </span>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <input type="submit" value="supprimer toute la selection" name="suppSlec" class="btn btn-danger float-right" />
                </form>
            </div>
        </article>
    </section>
    <script>
        <?php if(isset($_GET['c'])){ ?>
        $('#<?php echo $_GET['c']; ?>').attr("selected", "");
        <?php } ?>

        function rep() {
            var cases = $('input');
            for (var i = 1; i < cases.length; i++) {
                if (cases[i].type == 'checkbox') {
                    cases[i].checked = $('#all').prop('checked');
                }
            }
        }

    </script>
</body>

</html>
