<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/livres_modele.php');

    $val =  isset( $_POST['titre'] ) and isset( $_POST['auteur'] ) and isset( $_POST['cat'] ) and isset($_POST['stock']) and isset( $_POST['p_ach'] ) and isset( $_POST['p_loc'] ) and isset($_POST['desc']) and isset($_FILES['image']) and ($_FILES['image']['error']==0) ;

    if( $val) {
		
        $titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
		$stock =(int) htmlspecialchars($_POST['stock']);
        $cat = htmlspecialchars($_POST['cat']);
        $p_ach =(int) htmlspecialchars($_POST['p_ach']);
		$p_loc =(int) htmlspecialchars($_POST['p_loc']);
        $desc = htmlspecialchars($_POST['desc']);
		$info = pathinfo($_FILES['image']['name']);
		
		$ex = $info['extension'];
		$ex_aut = ['jpg','png','jpeg'];
		if(in_array($ex,$ex_aut) and $p_ach>=1 and $p_loc>=1 and $stock>=0){
			$image = basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], '../../images/livres/' . basename($_FILES['image']['name']));
			add($titre,$auteur,$stock,$cat,$p_ach,$p_loc,$desc,$image);
            header('Location: listeLivres_controleur.php');
		}
        
    }

    
    include('../vue/ajouterLivre_vue.php');
?>
