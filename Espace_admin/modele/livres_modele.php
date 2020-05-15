<?php
    // recuperer tout les livres 
    function get_livres(){
		global $bdd;
		$rep = $bdd->query ('SELECT * FROM livres ORDER BY id DESC '); 
		return $rep;
	}

    // avoir un livre celon son id
    function recherche_livre($id){
		global $bdd;
        $req= $bdd->prepare('SELECT * FROM livres WHERE id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}
    //ajouter un livre a la bdd
    function add($titre,$auteur,$stock,$cat,$p_ach,$p_loc,$desc,$image){
		global $bdd;
		$req = $bdd->prepare('INSERT INTO livres(titre,auteur,p_ach,p_loc,dispo,stock,cat,nb_v, disc ,promo,image) VALUES(:titre,:auteur,:p_ach,:p_loc,"oui",:stock,:cat ,"0", :desc ,0, :image)');
		$req->execute(array(
			'titre'=>$titre,
			'auteur'=>$auteur,
			'stock'=>$stock,
			'cat'=>$cat,
			'p_ach'=>$p_ach,
			'p_loc' =>$p_loc,
            'desc'=> $desc,
            'image'=> $image
		));
	}
    //supp un livre
    function supp($id){
		global $bdd;
		$donnees= recherche_livre($id);
		unlink('../../images/livres/'.$donnees['image']);
		$rep = $bdd->query ('DELETE FROM livres WHERE id='.$id);
	}
    //modifier le livre
    function modifier($id,$titre,$auteur,$dispo,$stock,$cat,$p_ach,$p_loc,$disc,$image){
		global $bdd;
		$donnees=recherche_livre($id);
		$rep=$bdd->prepare('UPDATE livres SET titre=:titre,auteur=:auteur,p_ach=:p_ach,p_loc=:p_loc,dispo=:dispo,stock=:stock,cat=:cat,nb_v=:nb_v,disc=:disc,image=:image where id = '.$id);
		$rep->execute(array(
			'titre'=>$titre,
			'auteur'=>$auteur,
			'dispo'=>$dispo,
			'stock'=>$stock,
			'cat'=>$cat,
			'nb_v'=>$donnees['nb_v'],
			'p_ach'=>$p_ach,
			'p_loc'=>$p_loc,
            'disc'=>$disc,
			'image'=>$image
		));
	}

    // barre de recherche 
    function rech($terme){
		global $bdd;
		$rep = $bdd->query('SELECT * FROM livres WHERE titre LIKE "%'.$terme.'%" or auteur LIKE "%'.$terme.'%" or cat LIKE "%'.$terme.'%" ORDER BY titre');
		return $rep;
	}

    // Filtrer la liste des livre
    function livreFilter($filtre){
        global $bdd;
		$rep = $bdd->query ('SELECT * FROM livres WHERE '.$filtre);
		return $rep;
    }

    // livres Update
    function livreUpdate($update,$id){
        global $bdd;
		$rep = $bdd->query ('UPDATE livres set'.$update.' WHERE id='.$id);
    }
    
    // get all ids
    function getIds(){
        global $bdd;
        $ids = $bdd->query('SELECT id FROM livres');
        return $ids;
    }
?>
