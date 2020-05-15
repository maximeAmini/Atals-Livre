<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();
    include('../modele/livre_modele.php');

    if(isset($_GET['livre'])){
        $liv =(int) $_GET['livre'];
        $livre = recherche_livre($liv);
        if(empty($livre)){
			header('Location: listeLivre_controleur.php');
		}
        $promo = getOne_promo($livre['promo']);
        if(isset($_SESSION['id'])){
             $lv= verif($liv,$_SESSION['id']);
        }
    }else{
        header('Location: listeLivre_controleur.php');
    }

    if(isset($_POST['num']) && isset($_POST['type']) and preg_match("#^0[1-68][0-9]{8}$#", $_POST['num']) ){
        
        $num = (int) $_POST['num'];
        
        if(empty($lv)){
            if(isset($_POST['nb']) && $_POST['type']=="Acheter" && $_POST['nb']>0 && $_POST['nb']<=$livre['stock'] ){
                $p = (int)$_POST['nb'];
                if($livre['promo']!=0){
                    $prix = $p * ($livre['p_ach']*$promo['pr']/100);
                }else{
                    $prix = $p * $livre['p_ach'];
                }
                add_com($_SESSION['id'],$_GET['livre'],$_POST['nb'],0,$prix,$num,"Acheter");
                mod_stk($livre['stock']-$_POST['nb'],$_GET['livre']);
                header('Location: listeCommandes_controleur.php');
            }else if(isset($_POST['nb_j']) && $_POST['type']=="Louer" && $_POST['nb_j']>0 && $_POST['nb_j']<=30){
                $prix = $_POST['nb_j'] * $livre['p_loc'];
                add_com($_SESSION['id'],$_GET['livre'],'0',$_POST['nb_j'],$prix,$num,"Louer");
                mod_dispo('non',$_GET['livre']);
                header('Location: listeCommandes_controleur.php');
            }
        }
	}

    include('../vue/livre_vue.php');
?>
