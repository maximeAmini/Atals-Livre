<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    if(!(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass'])))){
        header('Location: connexion_controleur.php');
    }

    nb_visites();
    include('../modele/connexion_modele.php');

    $membre =get_membre($_SESSION['id']);
    if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mail']) and isset($_POST['adr']) ){
        $_SESSION['mail']=$_POST['mail'];
        modifier($_SESSION['id'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['adr']);
        header('Location: profile_controleur.php');
    }

    include('../vue/modifierProfile_vue.php');
?>
