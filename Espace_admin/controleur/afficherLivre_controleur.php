<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/livres_modele.php');
    
    if(isset($_GET['livre']) && !empty(recherche_livre($_GET['livre'])) ){
        $livre=recherche_livre($_GET['livre']);
    }else{
        header('Location: listeLivres_controleur.php');
    }

    
    
    include('../vue/afficherLivre_vue.php');
?>
