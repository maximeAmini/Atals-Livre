<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/message_modele.php');

    //supp la selection
    if(isset($_POST['suppSlec'])){
        $ids = getIds();
        foreach($_POST['num'] as $ids){
            supp($ids);
        }
    }

    //supp un livre 
    if(isset($_GET['supp']) && !empty(recherche_message($_GET['supp']))){
        supp($_GET['supp']);
    }

    // Recherche
    if(isset($_GET['rech'])){
        $terme= htmlspecialchars($_GET['rech']);
		$terme= trim($terme);
		$terme = strip_tags($terme);
		
		$messages=rech($terme);
    }else{
       // Filtre
        if(isset($_GET['c'])){
            switch($_GET['c']){
                case 2 :
                    $messages = commFilter('livraison="non livré"');
                    break;
                case 3:
                    $messages = commFilter('livraison="livré"');
                    break;
            }
        }else{
            $messages = get_message();
        } 
    }
    
    
    
    
    include('../vue/listeMessage_vue.php');
?>
