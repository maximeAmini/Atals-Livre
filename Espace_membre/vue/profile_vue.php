<html>
<?php include('../autre/mod_mdp.php'); ?>

<head>
    <title>Profile | Atlas Livre</title>
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
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $membre['prenom']; ?></li>
                </ol>
            </nav>
        </article>
        <article>
            <h1 style="margin-bottom : 20px;">
                Vos Information :
                <a class="btn btn-outline-danger float-right" href="deco.php">Déconnexion.</a>
                <a class="btn btn-outline-primary float-right" href="modifierProfile_controleur.php">Modifier</a>
            </h1>
            <table class="table table-striped" style="margin-bottom : 20px;">
                <tbody>
                    <tr>
                        <th>Nom : </th>
                        <td><?php echo $membre['nom'].' '.$membre['prenom']; ?></td>
                    </tr>
                    <tr>
                        <th>E-mail : </th>
                        <td><a href="mailto:<?php echo $membre['mail']; ?>"><?php echo $membre['mail']; ?></a></td>
                    </tr>
                    <tr>
                        <th>Adresse : </th>
                        <td><?php echo $membre['adress']; ?></td>
                    </tr>
                    <tr>
                        <th>Nombre de commande effectué : </th>
                        <td>
                            <?php 
                            $nb = (int) get_nbComm($_SESSION['id']);
                            echo $nb; 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Mot de passe</th>
                        <td><a data-toggle="modal" data-target="#infos" href="#">Changer le mot de passe</a></td>
                    </tr>
                </tbody>
            </table>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
