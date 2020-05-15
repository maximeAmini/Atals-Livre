<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/livres_modele.php');

    if(isset($_GET['livre'])){
		$donnees=recherche_livre($_GET['livre']);
		if(empty($donnees)){
			header('Location: listeLivres_controleur.php');
		}
	}else{
		header('Location: listeLivres_controleur.php');
	}
    //mod le livre
	if(isset($_POST['titre']) and isset( $_POST['auteur'] ) and isset( $_POST['cat'] ) and isset($_POST['dispo']) and isset($_POST['stock']) and isset( $_POST['p_ach'] ) and isset( $_POST['p_loc'] ) and isset($_POST['desc']) ){
        
		$titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
		$stock =(int) htmlspecialchars($_POST['stock']);
        $cat = htmlspecialchars($_POST['cat']);
		$dispo=$_POST['dispo'];
		$p_ach =(int) htmlspecialchars($_POST['p_ach']);
		$p_loc =(int) htmlspecialchars($_POST['p_loc']);
        $disc=$_POST['desc'];
				
		if(isset($_FILES['image']) and ($_FILES['image']['error']==0)){
			$info = pathinfo($_FILES['image']['name']);
			$ex = $info['extension'];
			$ex_aut = ['jpg','png','jpeg'];
			if(in_array($ex,$ex_aut)){
				$image = basename($_FILES['image']['name']);
				move_uploaded_file($_FILES['image']['tmp_name'], '../../images/livres/' . basename($_FILES['image']['name']));
				modifier($_GET['livre'],$titre,$auteur,$dispo,$stock,$cat,$p_ach,$p_loc,$disc,$image);
				header('Location: listeLivres.php');
			}
		}
		else{
			modifier($_GET['livre'],$titre,$auteur,$dispo,$stock,$cat,$p_ach,$p_loc,$disc,$donnees['image']);
			header('Location: afficherLivre_controleur.php?id='.$donnees['id']);
		}
	}

    include('../vue/modifierLivre_vue.php');
?>
