<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/tabBord_modele.php');
    
    
    include('../vue/tabBord_vue.php');
?>
