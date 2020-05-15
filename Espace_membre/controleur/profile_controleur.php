<?php
    session_start();
    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    if(!(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass'])))){
        header('Location: connexion_controleur.php');
    }

    nb_visites();
    include('../modele/connexion_modele.php');
    $membre = get_membre($_SESSION['id']);

    include('../vue/profile_vue.php');
?>
