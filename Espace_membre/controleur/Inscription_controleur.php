<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/connexion_modele.php');
    include('../modele/accueil_modele.php');
    nb_visites();

    if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['pass']) and isset($_POST['pass2']) and isset($_POST['adr']) ){
		//variables
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$email = htmlspecialchars($_POST['email']);
		$pass = htmlspecialchars($_POST['pass']);
		$pass2 = htmlspecialchars($_POST['pass2']);
		$adr = htmlspecialchars($_POST['adr']);
		$donnees = recherche($email);
		
		if(($donnees==null) and ($pass == $pass2) and (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) ){
			ajouter($nom,$prenom,$email,$pass,$adr);
			$donnees = recherche($email);
			$_SESSION['id'] = $donnees['id'];
            $_SESSION['mail']= $donnees['mail'];
            $_SESSION['pass']= $donnees['pass'];
			header('Location: accueil_controleur.php');
        }
        
        if($donnees!=null or (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))){
            $mail="error";
        }else{
            if($pass != $pass2){
            $pass="error";
            }
        }
		
	}


    include('../vue/Inscription_vue.php');
?>
