<?php
    session_start();
    
    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();


    $nb =(int) ((nb_livres()/12));
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

    if(isset($_GET['ch'])){
        if($_GET['ch']=="1"){
            $livres=get_livres($page,12);
        }
        if($_GET['ch']=="3"){
            $livres=get_livres_order($page,12,"p_ach");
        }
        if($_GET['ch']=="4"){
            $livres=get_livres_order($page,12,"p_ach DESC");
        }
        if($_GET['ch']=="5"){
            $livres=get_livres_order($page,12,"nb_v DESC");
        }
    }
    include('../vue/listeLivre_vue.php');
?>
