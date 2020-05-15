<html>

<head>
    <title>Connexion | Atlas Livre</title>
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
                    <a class="nav-link" href="accueil_controleur.php" style="color:#fff;">Accueil</a>
                    <a class="nav-link" href="contactez_controleur.php" style="color:#fff;">Contact</a>
                    <a class="nav-link" href="Inscription_controleur.php" style="font-weight:bold; border-bottom:3px #fff solid;">Inscription</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover" style="margin-top:-100px;">
            <form class="form-horizontal col-lg-6 offset-lg-3" method="post" action='connexion_controleur.php' style="margin-top:150px;">
                <legend style="text-align:center;">Ne perdez plus de temps et connectez vous :</legend>

                <div class="input-group mb-2 mr-sm-2 offset-lg-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                    </div>
                    <input name="mail" id="mail" type="email" class="form-control form-control-lg col-lg-8" placeholder="Votre E-Mail">
                </div>

                <div class="input-group mb-2 mr-sm-2 offset-lg-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input name="mp" id="mp" type="password" class="form-control form-control-lg col-lg-8" placeholder="Votre mot de passe">
                </div>

                <div class="form-group">
                    <div class="col-sm-4 offset-sm-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="fas fa-check-circle"></span> connexion </button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p style="font-weight:bold;">Vous n'avez encore pas de compte ? <a href="inscription_controleur.php"> Inscrivez-vous.</a></p>
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
</body>
<script>
    <?php if($no==true){ ?>
    $('#mail').addClass('is-invalid');
    $('#mp').addClass('is-invalid');
    <?php } ?>

</script>

</html>
