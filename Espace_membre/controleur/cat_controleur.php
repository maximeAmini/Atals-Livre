<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();
    
    if(isset($_GET['cat'])){
        $nb =(int) ((nb_catLivre($_GET['cat'])/12));
        if(isset($_GET['page'])){
            $nP = $_GET['page'];
            if($nP<0){
                $nP = 0;
            }
            if($nP>$nb){
                $nP = $nb;
            }
            $page=$nP*12; 
        }else{
            $nP = 0;
            $page=0;
        }
        $livres=get_livres_cond($page,12,"cat",$_GET['cat']);
    }else{
        header('Location: listeLivre_controleur.php');
    }

    include('../vue/cat_vue.php');
?>
