<html>

<head>
    <title>Connexion | Atlas Livre </title>
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

<body class="text-center" id="con">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand"><a href="accueil_controleur.php" style="color:#fff;font-family: cursive;"><span class="fas fa-book"></span> <span style="color:#dc3545; font-weight:bold;"> A</span>tlas <span style="color:#007bff; font-weight:bold;">L</span>ivre</a></h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="accueil_controleur.php" style="color:#fff;">Accueil</a>
                    <a class="nav-link" href="contactez_controleur.php" style="color:#fff;">Contact</a>
                    <a class="nav-link" href="connexion_controleur.php" style="font-weight:bold; border-bottom:3px #fff solid;">Connexion</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover" style="text-align:left;">
            <form class="form-horizontal col-sm-6  offset-sm-3" method="post" action="inscription_controleur.php">
                <legend style="text-align:center">Rejoignez-nous vite ! On vous attend ! </legend>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12">Nom:</label>
                        <div class="col-sm-12">
                            <input id="nom" name="nom" type="text" placeholder="Nom " class="form-control " required="">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12">Prénom:</label>
                        <div class="col-sm-12">
                            <input id="prenom" name="prenom" type="text" placeholder="Prénom " class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12">E-Mail:</label>
                        <div class="col-sm-12">
                            <input id="mail" name="email" type="email" placeholder="E-Mail" class="form-control" required="" />
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12">Mot de passe:</label>
                        <div class="col-sm-12">
                            <input id="pass" name="pass" type=password placeholder="Mot De Passe" class="form-control" required="">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12">Confirmez Le Mot De Passe:</label>
                        <div class="col-lg-12">
                            <input id="pass2" name="pass2" type=password placeholder="Confirmez Le Mot De Pass" class="form-control" required="">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12">Adresse:</label>
                        <div class="col-sm-12">
                            <input id="adr" name="adr" type="text" placeholder="Adresse " class="form-control" required="">
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class="row">
                    <div class="form-group col-sm-12">
                        <div class="col-sm-12">
                            <button id="" name="" class="btn btn-success float-right">Inscription</button>
                        </div>
                    </div>
                    <!--texte-->
                    <div class="col-sm-12" style="text-align:center">
                        <label class="col-sm-12"> En cliquant ci-dessus, vous acceptez les<a href=#> Conditions de services et la Politique de confidentialité.</a> </label>
                    </div>
                </div>

            </form>
        </main>
        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p style="font-weight:bold;">
                    By <a href="https://ummto.com/"> ummto_L3 </a>
                    <a href="fb.com"><i class="fab fa-facebook"></i></a>
                    <a href="insta.com"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:Biblioteque_en_ligne@gmail.com"><i class="fab fa-google"></i></a>
                </p>
            </div>
        </footer>
    </div>
    <script>
        <?php if(isset($mail)){ ?>
        $('#mail').addClass('is-invalid');
        <?php }?>

        <?php if(isset($pass)){ ?>
        $('#pass2').addClass('is-invalid');
        <?php }?>

    </script>
</body>

</html>
