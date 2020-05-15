<?php
    // recuperer tout les commandes
    function get_commandes(){
		global $bdd;
		$rep = $bdd->query ('SELECT *,c.id as idC,DATE_FORMAT(date,"%d/%m/%Y")as date FROM commandes c,livres l,membres m WHERE l.id=id_livre and m.id=id_uti ORDER BY c.id DESC '); 
		return $rep;
	}

    // avoir une comm celon son id
    function recherche_comm($id){
		global $bdd;
        $req= $bdd->prepare('SELECT *,c.id as idC,l.id as idL,m.id as idM,DATE_FORMAT(date,"%d/%m/%Y")as date FROM commandes c,livres l,membres m WHERE l.id=id_livre and m.id=id_uti and c.id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}

    // barre de recherche 
    function rech($terme){
		global $bdd;
		$rep = $bdd->query('SELECT *,c.id as idC FROM commandes c,livres l,membres m WHERE l.id=id_livre and m.id=id_uti and l.titre LIKE "%'.$terme.'%" or m.nom LIKE "%'.$terme.'%" or m.prenom LIKE "%'.$terme.'%" ORDER BY c.id DESC');
		return $rep;
	}

    // Filtrer la liste des livre
    function commFilter($filtre){
        global $bdd;
		$rep = $bdd->query ('SELECT *,c.id as idC FROM commandes c,livres l,membres m WHERE l.id=id_livre and m.id=id_uti and '.$filtre);
		return $rep;
    }

    // livres Update
    function commUpdate($update,$id){
        global $bdd;
		$rep = $bdd->query ('UPDATE commandes set'.$update.' , dateL=now() WHERE id='.$id);
    }

    //supp une commandes
    function supp($id){
		global $bdd;
		$rep = $bdd->query ('DELETE FROM commandes WHERE id='.$id);
	}

    // get all ids
    function getIds(){
        global $bdd;
        $ids = $bdd->query('SELECT id FROM commandes');
        return $ids;
    }
?>
