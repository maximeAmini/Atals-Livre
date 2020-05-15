<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand text-center" href="accueil_controleur.php" style="text-align:center;font-family: cursive;" id="navTitre">
        <i class="fas fa-book"></i>
        <span style="color:#dc3545; font-weight:bold;"> A</span>tlas <span style="color:#007bff; font-weight:bold;">L</span>ivre
        <br />
        <span style="font-size : 10px; text-align:center;">Tout vos livres sont ici.</span>
    </a>
    <form class="form-inline my-2 my-lg-0 recha" style="padding-top:10px;" method="get" action="recherche_controleur.php">
        <div class="input-group mb-2 mr-sm-2">
            <input type="search" class="form-control" placeholder="Recherche" id="recherche" name="rech">
            <div class="input-group-prepend">
                <button type="submit" class="input-group-text" id="logosearch"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="accueil_controleur.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listeLivre_controleur.php">Liste des livres</a>
            </li>
            <?php 
                
                if(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass'])) ){
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Commandes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="listeCommandes_controleur.php">Liste des commandes</a>
                    <a class="dropdown-item" href="listeCommandesLouer_controleur.php">Vos livres louér</a>
                </div>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="contactez_controleur.php">Contactez</a>
            </li>
        </ul>
        <div class="float-left">
            <a style="color:orange; margin-right:20px; text-align:center; text-decoration: none;" href="panier_controleur.php">
                <i class="fas fa-shopping-cart"></i>
                <sup>
                    <?php if(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass']))){?>
                    <span class="badge badge-danger rounded-circle"><?php echo get_nb_pan($_SESSION['id']); ?></span>
                    <?php } ?>
                </sup>
            </a>
            <?php 
                if(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass']))){
            ?>
            <a style="color:#fff;" href="profile_controleur.php">
                <i class="fas fa-user-circle" style="font-size:20px;"></i>
            </a>
            <?php } else{ ?>
            <a style="color:#fff;" href="connexion_controleur.php">Connexion <span class="fas fa-sign-in-alt"></span></a>
            <?php } ?>
        </div>
    </div>
</nav>
