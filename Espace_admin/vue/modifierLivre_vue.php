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
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-edit"></i> Modifier le livre</h1>
        </div>
        <article class="offset-sm-1">
            <form class="form-horizontal col-sm-8 offset-sm-1" method="post" action="modifierLivre_controleur.php?livre=<?php echo $donnees['id'] ?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Titre : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="text" name="titre" value="<?php echo $donnees['titre'];  ?>" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Auteur : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="text" name="auteur" value="<?php echo $donnees['auteur'];  ?>" required="">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Catégorie : </label>
                    <div class="col-lg-5">
                        <select class="form-control" name="cat" id="cat" required="">
                            <option value="Fantastiques" id="Fantastiques">Fantastiques</option>
                            <option value="Policier" id="Policier">Policier</option>
                            <option value="Thriller" id="Thriller">Thriller</option>
                            <option value="Manga" id="Manga">Manga</option>
                            <option value="Fiction" id="Fiction">Fiction</option>
                            <option value="Light Novel" id="Light">Light Novel</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Stock : </label>
                    <div class="input-group col-lg-5 ">
                        <input type="number" class="form-control " id="text" name="stock" required="" value="<?php echo $donnees['stock'];  ?>">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="logosearch">Livres</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group row">
                        <label for="text" class="col-lg-3 lab">Prix Achat : </label>
                        <div class="col-lg-4">
                            <div class="input-group col-lg-9 ">
                                <input type="number" class="form-control " id="text" value="<?php echo $donnees['p_ach']; ?>" name="p_ach" required="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="logosearch">DA</span>
                                </div>
                            </div>
                        </div>
                        <label for="text" class="col-lg-2 lab">Location: </label>
                        <div class="col-lg-3 add">
                            <div class="input-group col-lg-12 ">
                                <input type="number" class="form-control " id="text" value="<?php echo $donnees['p_loc']; ?>" name="p_loc" required="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="logosearch">DA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Disponibilité : </label>
                    <label for="oui" class="radio col-lg-3 col-lg-offset-1" style="margin-left:20px;">
                        <input type="radio" name="dispo" value="oui" id="oui">
                        Oui
                    </label>
                    <label for="non" class="radio col-lg-3" style="margin-left:20px;">
                        <input type="radio" name="dispo" value="non" id="non">
                        Non
                    </label>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Description : </label>
                    <div class="col-lg-9">
                        <textarea class="form-control " id="text" name="desc" required="" rows="5"><?php echo $donnees['disc']; ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <img class="col-lg-4" src="../../images/livres/<?php echo $donnees['image'] ?>" width="80" height="300" />
                    <div class="row col-lg-8">
                        <div class="form-group">
                            <label for="text" class="col-lg-12">voulez vous changer la couverture ? </label>
                            <div class="col-lg-9">
                                <input type="file" id="text" name="image" value="<?php echo $donnees['auteur'];  ?>">
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
    <script>
        $('#<?php echo $donnees['cat']; ?>').attr("selected", "");
        <?php if ($donnees['cat']=="Light Novel"){?>
        $('#Light').attr("selected", "");
        <?php } ?>
        $('#<?php echo $donnees['dispo']; ?>').attr("checked", "");

    </script>
</body>

</html>
