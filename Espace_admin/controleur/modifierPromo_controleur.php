<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/promotions_modele.php');

    if(isset($_GET['promo'])){
		$donnees=recherche_promo($_GET['promo']);
		if(empty($donnees)){
			header('Location: listePromotions_controleur.php');
		}
	}else{
		header('Location: listePromotions_controleur.php');
	}
    //mod le livre
	if(isset($_POST['titre']) and isset( $_POST['pr'] ) and isset( $_POST['slogan'] ) ){
        
		$titre = htmlspecialchars($_POST['titre']);
        $pr = htmlspecialchars($_POST['pr']);
        $slogan=htmlspecialchars($_POST['slogan']);
				
		if(isset($_FILES['image']) and ($_FILES['image']['error']==0)){
			$info = pathinfo($_FILES['image']['name']);
			$ex = $info['extension'];
			$ex_aut = ['jpg','png','jpeg'];
			if(in_array($ex,$ex_aut)){
				$image = basename($_FILES['image']['name']);
				move_uploaded_file($_FILES['image']['tmp_name'], '../../images/promotion/' . basename($_FILES['image']['name']));
				modifier($_GET['promo'],$titre,$pr,$solgan);
				header('Location: listePromotions_controleur.php');
			}
		}
		else{
			modifier($_GET['promo'],$titre,$pr,$slogan,$donnees['image']);
			header('Location: listePromotions_controleur.php');
		}
	}

    include('../vue/modifierPromo_vue.php');
?>
