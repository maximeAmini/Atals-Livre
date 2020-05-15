<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/param_modele.php');
    $yes = false;
    $yes2=false;
    // mod le profile
    if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mail'])){
        mod_admin($_POST['nom'],$_POST['prenom'],$_POST['mail']);
        $yes=true;
    }

    //mod le mot de passe

    if(isset($_POST['old']) and isset($_POST['new1']) and isset($_POST['new2'])){
        $admin1 = get_admin();
        if($admin1['pass']==sha1($_POST['old']) and $_POST['new1']==$_POST['new1']){
            mod_mdp(sha1($_POST['new1']));
            $yes2=true;
        }
    }

    $admin = get_admin();
    
    
    include('../vue/param_vue.php');
?>
