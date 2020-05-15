<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();
    include('../modele/contactez_modele.php');
    $yes=false;
    if(isset($_POST['message'])){
        $message= htmlspecialchars($_POST['message']);
        if(isset($_SESSION['id'])){
            $id_uti=$_SESSION['id'];
            message($id_uti,$message);
            $yes=true;
        }
	}

    include('../vue/contactez_vue.php');
?>
