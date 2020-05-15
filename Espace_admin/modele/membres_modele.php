<?php
     // recuperer tout les membres
    function get_membres(){
		global $bdd;
		$rep = $bdd->query ('SELECT * FROM membres ORDER BY id DESC '); 
		return $rep;
	}

     // avoir un membre celon son id
    function recherche_membre($id){
		global $bdd;
        $req= $bdd->prepare('SELECT * FROM membres WHERE id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}
    
    //supp un membre
    function supp($id){
		global $bdd;
        $rep = $bdd->query ('DELETE FROM panier WHERE id_u='.$id);
        $rep = $bdd->query ('DELETE FROM commandes WHERE id_uti='.$id);
        $rep = $bdd->query ('DELETE FROM message WHERE id_u='.$id);
        
		$rep = $bdd->query ('DELETE FROM membres WHERE id='.$id);
        
	}
    
    // rech un membre
    function rech($terme){
		global $bdd;
		$rep = $bdd->query('SELECT * FROM membres WHERE nom LIKE "%'.$terme.'%" or prenom LIKE "%'.$terme.'%" or adress LIKE "%'.$terme.'%" ORDER BY nom');
		return $rep;
	}
    
    // get all ids
    function getIds(){
        global $bdd;
        $ids = $bdd->query('SELECT id FROM membres');
        return $ids;
    }

?>
