<footer class="container-fluid" style="color:white; margin-bottom: 0px; margin-top: 10px; padding-top: 10px; background-color:#343a40;">
    <!--livres-->
    <div class="row">
        <div class="col-sm-3">
            <h4>- Livres :</h4>
            <?php 
			$rep=get_livres(3,4);
            echo '<ul>';
			while($donnees=$rep->fetch()){
                echo '<li><a href="livre_controleur.php?livre='.$donnees['id'].'">'.$donnees['titre'].'</a>';
            }
            echo '</ul>';
		?>
        </div>
        <!--Images-->
        <div class="col-sm-3">
            <h4>-Images :</h4>
            <?php 
		$rep=get_livres(0,3);
		while($donnees=$rep->fetch()){
			echo '<a href="../../images/livres/'.$donnees['image'].'"><img src="../../images/livres/'.$donnees['image'].'" width=50 Style="margin-left:5px;"/></a>';
		}
						 ?>
        </div>
        <!--Liens -->
        <div class="col-sm-3">
            <h4>-Liens :</h4>
            <ul>
                <li><a href='../../Espace_admin/controleur/connexion_controleur.php'>Admins.</a></li>
                <li><a href='listeLivre_controleur.php'>Autres livres.</a></li>
                <li><a href='contactez_controleur.php'>Contacter.</a></li>
            </ul>
        </div>
        <!--droits-->
        <div class="col-sm-3">
            <form class="form-horizontal col-lg-12" method="get" action="Recherche_controleur.php">
                <h4>- Recherche :</h4>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input id="rech" name="rech" class="form-control" placeholder="Recherche" type='search'>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 offset-lg-6">
                            <button id="connexion " name="connexion " class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search"></span> Recherche </button>
                        </div>
                    </div>
                </div>
            </form>
            <p class="btn float-right">Tous droits réservér.</p>
        </div>
        <div class="col-sm-12 text-center">
            <p style="font-weight:bold;">
                By <a href="https://ummto.com/"> ummto_L3 </a>
                <a href="fb.com"><i class="fab fa-facebook"></i></a>
                <a href="insta.com"><i class="fab fa-instagram"></i></a>
                <a href="mailto:Biblioteque_en_ligne@gmail.com"><i class="fab fa-google"></i></a>
            </p>
        </div>
    </div>
</footer>
