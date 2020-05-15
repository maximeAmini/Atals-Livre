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
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-edit"></i> Modifier la promotion</h1>
        </div>
        <article class="offset-sm-1">
            <form class="form-horizontal col-sm-8 offset-sm-1" method="post" action="modifierPromo_controleur.php?promo=<?php echo $donnees['id'] ?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Titre : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="text" name="titre" value="<?php echo $donnees['titre'];  ?>" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Auteur : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="text" name="pr" value="<?php echo $donnees['pr'];  ?>" required="">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Description : </label>
                    <div class="col-lg-9">
                        <textarea class="form-control " id="text" name="slogan" required="" rows="5"><?php echo $donnees['slogan']; ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <img class="col-lg-4" src="../../images/promotion/<?php echo $donnees['image'] ?>" width="80" height="150" />
                    <div class="row col-lg-8">
                        <div class="form-group">
                            <label for="text" class="col-lg-12">voulez vous changer la couverture ? </label>
                            <div class="col-lg-9">
                                <input type="file" id="text" name="image">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary float-right" value="Modifier le livre">
                </div>
            </form>
        </article>
    </section>
</body>

</html>
