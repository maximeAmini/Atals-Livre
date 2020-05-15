<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/livres_modele.php');
    include('../modele/stat_modele.php');

    include('../vue/stat_vue.php');
?>
