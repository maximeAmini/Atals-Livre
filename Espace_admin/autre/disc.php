<?php 

    include('../../autre/bdd.php');
    include("../modele/livres_modele.php");
    $donnees=recherche_livre($_GET['id']);
    echo $donnees['disc'];
?>
