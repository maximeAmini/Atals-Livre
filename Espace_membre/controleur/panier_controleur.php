<?php
    session_start();
include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    if(!(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass'])))){
        header('Location: connexion_controleur.php');
    }

    nb_visites();
    include('../modele/panier_modele.php');
    include('../modele/livre_modele.php');
    
    $pan = "yes";
    
    if(isset($_SESSION['id'])){
        if(isset($_GET['supp'])){
            supp_pan($_GET['supp'],$_SESSION['id']);
        }
        if(isset($_GET['add'])){
            $ver= !(empty(recherche($_GET['add'],$_SESSION['id'])));
            if(empty(recherche($_GET['add'],$_SESSION['id']))){
                add_pan($_GET['add'],$_SESSION['id']);
            }
        }
        if(isset($_POST['num']) && isset($_POST['nb']) && isset($_POST['type']) ){
            $prix = $_POST['nb'] * recherche_livre($_GET['id'])['p_ach'];
            add_com($_SESSION['id'],$_GET['id'],$_POST['nb'],$prix,$_POST['num'],$_POST['type']);
            supp_pan($_GET['supp']);
            header('Location: livraisons_controle.php?com="reussi"');
        }
        $panier=get_pan($_SESSION['id']);
    }

    include('../vue/panier_vue.php');
?>
