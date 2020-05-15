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
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-plus-circle"></i> Ajouter un livre</h1>
        </div>
        <article class="offset-sm-1">
            <form class="form-horizontal col-lg-8 offset-lg-1" id="f" method="post" action="ajouterLivre_controleur.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="titre" class="col-lg-3 lab">Titre : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="titre" name="titre" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="auteur" class="col-lg-3 lab">Auteur : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="auteur" name="auteur" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cat" class="col-lg-3 lab">Catégorie : </label>
                    <div class="col-sm-5" id='cat'>
                        <select class="form-control" name="cat" required="">
                            <option value="Fantastiques">Fantastiques</option>
                            <option value="Policier">Policier</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Romance">Romance</option>
                            <option value="Manga">Manga</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Light Novel">Light Novel</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stk" class="col-lg-3 lab">Stock : </label>
                    <div class="input-group col-lg-5 ">
                        <input type="number" class="form-control " id="stk" name="stock" required min=0>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="logosearch">Livres</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pach" class="col-lg-3 lab">Prix Achat : </label>
                    <div class="input-group col-lg-4 ">
                        <input type="number" class="form-control " id="pach" name="p_ach" required min=1>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="logosearch">DA</span>
                        </div>
                    </div>
                    <label for="ploc" class="col-lg-2 lab">Location: </label>
                    <div class="input-group col-lg-3  ">
                        <input type="number" class="form-control " id="ploc" name="p_loc" required min=1>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="logosearch">DA</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-lg-3 lab">Description : </label>
                    <div class="col-lg-9">
                        <textarea class="form-control " id="desc" name="desc" required="" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="img" class="col-lg-3 lab">Couverture : </label>
                    <div class="col-lg-9">
                        <input type="file" id="img" name="image" required="">
                    </div>
                </div>
                <div class="form-group">
                    <button id="" name="" class="btn btn-primary float-right">Publier le livre</button>
                </div>
            </form>
        </article>
    </section>
</body>

</html>
