<html>

<head>
    <title>modifier profile | Atlas Livre</title>
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
                    <li class="breadcrumb-item"><a href="profile_controleur.php">Profile</a></li>
                    <li class="breadcrumb-item active" aria-current="page">modifier le profile</li>
                </ol>
            </nav>
        </article>
        <article>
            <form method="post" action="modifierProfile_controleur.php" class="col-sm-10 offset-sm-1">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12">Nom:</label>
                        <div class="col-sm-12">
                            <input id="nom" name="nom" type="text" placeholder="Nom " class="form-control " required="" value="<?php echo $membre['nom']; ?>">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12">Prénom:</label>
                        <div class="col-sm-12">
                            <input id="prenom" name="prenom" type="text" placeholder="Prénom " class="form-control" required="" value="<?php echo $membre['prenom']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12">E-Mail:</label>
                        <div class="col-sm-12">
                            <input id="email" name="mail" type="text" placeholder="E-Mail" class="form-control" required="" value="<?php echo $membre['mail']; ?>" />
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12">Adresse:</label>
                        <div class="col-sm-12">
                            <input id="adr" name="adr" type="text" placeholder="Adresse " class="form-control" required="" value="<?php echo $membre['adress']; ?>">
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group col-sm-12">
                        <div class="col-sm-12">
                            <button id="" name="" class="btn btn-primary float-right">Modifier</button>
                        </div>
                    </div>
                </div>
            </form>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
