<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/membres_modele.php');

    //supp la selection
    if(isset($_POST['suppSlec'])  and isset($_POST['num'])){
        $ids = getIds();
        foreach($_POST['num'] as $ids){
            supp($ids);
        }
    }

    //supp un livre 
    if(isset($_GET['supp']) && !empty(recherche_membre($_GET['supp']))){
        supp($_GET['supp']);
    }


    // Recherche
    if(isset($_GET['rech'])){
        $terme= htmlspecialchars($_GET['rech']);
		$terme= trim($terme);
		$terme = strip_tags($terme);
		
		$membres=rech($terme);
    }else{
        $membres = get_membres(); 
    }
    
    
    
    
    include('../vue/listeMembres_vue.php');
?>
