<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: connexion_controleur.php');
    }

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();
    include('../modele/livre_modele.php');
    

    if(isset($_GET['comm'])){
        $comm = (int) $_GET['comm'];
        $commande = rech_com($comm,$_SESSION['id']);
        if(empty($commande)){
			header('Location: listeCommandes_controleur.php');
		}
    }else{
        header('Location: listeCommandes_controleur.php');
    }

    include('../vue/commande_vue.php');
?>
