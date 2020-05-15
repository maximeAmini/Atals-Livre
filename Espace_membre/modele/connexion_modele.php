<?php

	 function recherche($e){
        global $bdd;
        $req= $bdd->prepare('SELECT * FROM membres WHERE mail= :e');
        $req->execute(array( 'e'=>$e));
        $donnees= $req->fetch();
        return $donnees;
    }

	function get_membre($id){
		global $bdd;
        $req= $bdd->prepare('SELECT * FROM membres WHERE id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}
	
	function ajouter($nom,$prenom,$email,$pass,$adr){
		global $bdd;
		$pass=sha1($pass);
		$req = $bdd->prepare('INSERT INTO membres(nom,prenom,mail,pass,adress) VALUES(:nom,:prenom,:email,:pass,:adr)');
		$req->execute(array(
			'nom'=>$nom ,
			'prenom'=> $prenom ,
			'email'=> $email,
			'pass'=> $pass,
			'adr'=> $adr
		));
	}

	function modifier($id,$nom,$prenom,$mail,$adr){
		global $bdd;
		$rep=$bdd->prepare('UPDATE membres SET nom=:nom,prenom=:prenom,mail=:mail,adress=:adr where id = '.$id);
		$rep->execute(array(
			'nom'=>$nom,
			'prenom'=>$prenom,
			'mail'=>$mail,
			'adr'=>$adr
		));
	}

    function mod_mp($id,$mp){
        global $bdd;
		$rep=$bdd->prepare('UPDATE membres SET pass=:pass  where id = '.$id);
		$rep->execute(array(
            "pass"=>$mp
		));
    }
?>
