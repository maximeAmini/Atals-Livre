<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/promotions_modele.php');

    //supp la selection
    if(isset($_POST['suppSlec'])  and isset($_POST['num'])){
        $ids = getIds();
        foreach($_POST['num'] as $ids){
            supp($ids);
        }
    }

    //supp un livre 
    if(isset($_GET['supp']) && !empty(recherche_promo($_GET['supp']))){
        supp($_GET['supp']);
    }


    // Recherche
    if(isset($_GET['rech'])){
        $terme= htmlspecialchars($_GET['rech']);
		$terme= trim($terme);
		$terme = strip_tags($terme);
		
		$promos=rech($terme);
    }else{
        $promos = get_promo(); 
    }
    
    
    
    
    include('../vue/listePromotions_vue.php');
?>
