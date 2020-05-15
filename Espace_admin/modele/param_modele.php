<?php
    function get_admin(){
        global $bdd;
        $rep= $bdd->query('SELECT * FROM admins WHERE id=1');
        $donnees= $rep->fetch();
        return $donnees; 
    }

    function mod_admin($nom,$prenom,$mail){
        global $bdd;
        $rep= $bdd->prepare('UPDATE admins SET nom=:nom , prenom=:prenom , mail = :mail WHERE id=1 ');
        $rep->execute(array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'mail'=>$mail
        ));
    }

    function mod_mdp($mdp){
        global $bdd;
        $rep= $bdd->query('UPDATE admins SET pass="'.$mdp.'" WHERE id=1 ');
    }


?>
