<?php
     // recuperer tout les messages
    function get_message(){
		global $bdd;
		$rep = $bdd->query ('SELECT *,m.id as idM,DATE_FORMAT(date,"%d/%m/%Y %H:%i")as date FROM message m,membres mb WHERE m.id_u=mb.id  ORDER BY m.id DESC '); 
		return $rep;
	}

     // avoir un message celon son id
    function recherche_message($id){
		global $bdd;
    $req= $bdd->prepare('SELECT *,m.id as idM, DATE_FORMAT(date,"%d/%m/%Y %H:%i")as date FROM message m,membres mb WHERE m.id_u=mb.id and m.id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}
    
    //supp un message
    function supp($id){
		global $bdd;
		$rep = $bdd->query ('DELETE FROM message WHERE id='.$id);
		$bdd->query ('ALTER TABLE message AUTO_INCREMENT=0');
	}
    
    // rech un membre
    function rech($terme){
		global $bdd;
		$rep = $bdd->query('SELECT *,m.id as idM FROM message m,membres mb WHERE (nom LIKE "%'.$terme.'%" or prenom LIKE "%'.$terme.'%" or adress LIKE "%'.$terme.'%" or date LIKE "%'.$terme.'%") and m.id_u=mb.id ORDER BY m.id');
		return $rep;
	}
    
    // get all ids
    function getIds(){
        global $bdd;
        $ids = $bdd->query('SELECT id FROM message');
        return $ids;
    }


?>
