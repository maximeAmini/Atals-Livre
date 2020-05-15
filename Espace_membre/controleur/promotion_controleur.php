<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();
    
    if(isset($_GET['promo'])){
        $livres = rech_promo(0,12,$_GET['promo']);
        $promo=getOne_promo($_GET['promo']);
    }else{
        header('Location: listeLivre_controleur.php');
    }

    include('../vue/promotion_vue.php');
?>
