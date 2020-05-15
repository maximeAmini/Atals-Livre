<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/message_modele.php');
    
    if(isset($_GET['mess']) && !empty(recherche_message($_GET['mess'])) ){
        $mess=recherche_message($_GET['mess']);
    }else{
        header('Location: listeMessage_controleur.php');
    }

    
    
    include('../vue/afficherMessage_vue.php');
?>
