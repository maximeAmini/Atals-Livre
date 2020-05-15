<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/livres_modele.php');
    //supp la selection
    if(isset($_POST['suppSlec']) and isset($_POST['num'])){
        $ids = getIds();
        foreach($_POST['num'] as $ids){
            supp($ids);
        }
    }

    //supp un livre 
    if(isset($_GET['supp']) && !empty(recherche_livre($_GET['supp']))){
        supp($_GET['supp']);
    }

    // stock et disponibilites
	if (isset($_GET['oui'])){
		livreUpdate(' dispo="oui"',$_GET['oui']);
	}
	if (isset($_GET['non'])){
		livreUpdate(' dispo="non" ',$_GET['non']);
	}
	if (isset($_GET['plus'])){
        livreUpdate(' stock=stock+1',$_GET['plus']);
	}
	if (isset($_GET['minus'])){
        livreUpdate(' stock=stock-1',$_GET['minus']);
	}

    // Recherche
    if(isset($_GET['rech'])){
        $terme= htmlspecialchars($_GET['rech']);
		$terme= trim($terme);
		$terme = strip_tags($terme);
		
		$livres=rech($terme);
    }else{
       // Filtre
        if(isset($_GET['c'])){
            switch($_GET['c']){
                case 2 :
                    $livres= livreFilter('stock=0');
                    break;
                case 3:
                    $livres = livreFilter('dispo="non"');
                    break;
            }
        }else{
            $livres = get_livres();
        } 
    }
    
    
    
    
    include('../vue/listeLivres_vue.php');
?>
