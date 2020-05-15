<?php 

    include('../../autre/bdd.php');
    include("../modele/accueil_modele.php");
    $donnees=recherche_livre($_GET['id']);
    echo $donnees['disc'];
?>
