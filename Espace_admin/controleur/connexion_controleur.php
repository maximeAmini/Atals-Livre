<?php
    session_start();

    include("../../autre/bdd.php");
    include("../modele/connexion_modele.php");

    if( isset( $_POST['mail'] ) and isset( $_POST['mp'] )) {
        
        $email = htmlspecialchars($_POST['mail']);
        $pass = htmlspecialchars($_POST['mp']);
        $donnees = recherche($email);
        
        if( $donnees != null and sha1($pass)==$donnees['pass']){
            $_SESSION['admin'] = $donnees['id'];
            header('Location: tabBord_controleur.php');
        }
    }
    include_once("../vue/connexion_vue.php");
?>
