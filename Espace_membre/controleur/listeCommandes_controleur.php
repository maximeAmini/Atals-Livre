<?php
    session_start();
    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    if(!(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass'])))){
        header('Location: connexion_controleur.php');
    }

    nb_visites();
    include('../modele/livre_modele.php');
    
    if(isset($_GET['supp'])){
        $comm = rech_com($_GET['supp'],$_SESSION['id']);
        $date = date_diff(date_create(date('d-m-Y')),date_create($comm['date']));
        $date =(int)($date->format('%a'));
        if($date<3){
            supp($_GET['supp'],$_SESSION['id']);
        }
	}

    include('../vue/listeCommandes_vue.php');
?>
