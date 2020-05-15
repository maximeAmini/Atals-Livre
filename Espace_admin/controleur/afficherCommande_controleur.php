<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/Commandes_modele.php');
    
    if(isset($_GET['comm'])){
        $livre=recherche_comm($_GET['comm']);
    }else{
        header('Location: listeCommandes_controleur.php');
    }

    
    
    include('../vue/afficherCommande_vue.php');
?>
