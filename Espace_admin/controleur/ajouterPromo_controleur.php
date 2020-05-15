<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/promotions_modele.php');

    $val =  isset( $_POST['titre'] ) and isset( $_POST['slogan'] ) and isset( $_POST['pr'] ) and isset($_FILES['image']) and ($_FILES['image']['error']==0) ;

    if( $val) {
		
        $titre = htmlspecialchars($_POST['titre']);
        $pr =(int) htmlspecialchars($_POST['pr']);
		$slogan = htmlspecialchars($_POST['slogan']);
		$info = pathinfo($_FILES['image']['name']);
		
		$ex = $info['extension'];
		$ex_aut = ['jpg','png','jpeg'];
		if(in_array($ex,$ex_aut)){
			$image = basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], '../../images/promotion/' . basename($_FILES['image']['name']));
			add_promo($titre,$pr,$slogan,$image);
            header('Location: listepromotions_controleur.php');
		}
        
    }

    
    include('../vue/ajouterPromo_vue.php');
?>
