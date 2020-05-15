<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();

    if(isset($_GET['rech'])){
		$terme= htmlspecialchars($_GET['rech']);
		$terme= trim($terme);
		$terme = strip_tags($terme);
		
		$livres=rech($terme);
	}


    include('../vue/recherche_vue.php');
?>
