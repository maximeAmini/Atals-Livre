<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/commandes_modele.php');
    
    //supp la selection
    if(isset($_POST['suppSlec'])  and isset($_POST['num'])){
        $ids = getIds();
        foreach($_POST['num'] as $ids){
            supp($ids);
        }
    }

    //supp un livre 
    if(isset($_GET['supp']) && !empty(recherche_comm($_GET['supp']))){
        supp($_GET['supp']);
    }

    // livraison
	if (isset($_GET['oui'])){
		commUpdate(' livraison="livré"',$_GET['oui']);
	}
	if (isset($_GET['non'])){
		commUpdate(' livraison="non livré" ',$_GET['non']);
	}

    // Recherche
    if(isset($_GET['rech'])){
        $terme= htmlspecialchars($_GET['rech']);
		$terme= trim($terme);
		$terme = strip_tags($terme);
		
		$comms=rech($terme);
    }else{
       // Filtre
        if(isset($_GET['c'])){
            switch($_GET['c']){
                case 2 :
                    $comms = commFilter('livraison="non livré"');
                    break;
                case 3:
                    $comms = commFilter('livraison="livré"');
                    break;
            }
        }else{
            $comms = get_commandes();
        } 
    }
    
    
    
    
    include('../vue/listeCommandes_vue.php');
?>
