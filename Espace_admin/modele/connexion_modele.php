<?php
	function recherche($e){
        global $bdd;
        $req= $bdd->prepare('SELECT * FROM admins WHERE mail= :e');
        $req->execute(array( 'e'=>$e));
        $donnees= $req->fetch();
        return $donnees;
    }
?>
