<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/connexion_modele.php');
    include('../modele/accueil_modele.php');
    nb_visites();
    $no=false;
    if( isset( $_POST['mail'] ) and isset( $_POST['mp'] )) { 
        $email = htmlspecialchars($_POST['mail']);
        $pass = htmlspecialchars($_POST['mp']);
        
        $donnees = recherche($email);
        if($donnees != null and sha1($pass)==$donnees['pass']){
            $_SESSION['id'] = $donnees['id'];
            $_SESSION['mail']= $donnees['mail'];
            $_SESSION['pass']= $donnees['pass'];
            header('Location: accueil_controleur.php');
        }else{
            $no=true;
        }
	}
    include('../vue/connexion_vue.php');
?>
