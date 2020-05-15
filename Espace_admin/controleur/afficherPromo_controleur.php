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
            retirer($ids);
        }
    }

    if(isset($_GET['promo'])){
        if(isset($_GET['supp'])){
            retirer($_GET['supp']);
        }
        $promo=recherche_promo($_GET['promo']);
        $livres=livres_promo($_GET['promo']);
    }else{
       header('Location: listePromotions_controleur.php');
    }

    include('../vue/afficherPromo_vue.php');
?>
