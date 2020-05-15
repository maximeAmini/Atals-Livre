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
        <div class="table-responsive">
            <table class="table table-striped table-condensed ">
                <tr>
                    <td>
                        <strong><?php echo $mess['nom'].' '.$mess['prenom']; ?></strong>
                        <br>E-mail : <a href="<?php echo $mess['mail']; ?>"><?php echo $mess['mail']; ?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="text-center"><?php echo $mess['message']; ?></p>
                        <div style="font-size:13px;">
                            <strong><?php echo $mess['date']; ?></strong>
                            <a href="listeMessage_controleur.php?supp=<?php echo $mess['id']; ?>" class="float-right" style="color:#a00;"> Supprimer</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form class="col-sm-6 offset-sm-3" method="post" action="mailto:<?php echo $mess['mail']; ?>">
                            <div class="form-group col-sm-10 offset-sm-1">
                                <label for="textarea" class="col-sm-12">Votre Reponse : </label>
                                <textarea id="message" name="message" type="textarea" class="formcontrol offset-sm-2" placeholder="Votre message" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group float-right ">
                                <div class="col-lg-12">
                                    <button id="envoye" name="envoyé" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> envoyé </button>
                                </div>
                            </div>

                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</body>

</html>
