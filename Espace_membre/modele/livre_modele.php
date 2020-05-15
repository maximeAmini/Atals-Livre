<?php
    // commander 
    function add_com($id_u,$id_l,$nb_l,$nb_j,$prix,$num,$etat){
		global $bdd;
        $nb_l = (int) $nb_l;
		$req = $bdd->prepare('INSERT INTO commandes(id_uti,id_livre,nb_l,nb_j,prix,num,etat,livraison,date) VALUES(:id_u,:id_l,:nb_l,:nb_j,:prix,:num,:etat,"non livré",NOW())');
		$req->execute(array(
			'id_u'=>$id_u,
			'id_l'=>$id_l,
            'prix'=>$prix,
            'nb_l'=>$nb_l,
            'nb_j'=>$nb_j,
            'num'=> $num,
			'etat'=>$etat
		));
    }
    // recherche une commande 
    function rech_com($id,$id_uti){
        global $bdd;
        $rep = $bdd->query('SELECT *, c.id as id_comm FROM commandes c,livres l WHERE l.id = id_livre and c.id ='.$id.' and c.id_uti='.$id_uti);
        $donnees=$rep->fetch();
        return $donnees;
    }
    // verifier si la commande existe et si elle est livré
    function verif($livre,$id){
        global $bdd;
        $rep = $bdd->query('SELECT * FROM commandes,livres WHERE id_livre="'.$livre.'" and livraison = "non livré" and id_uti='.$id);
        $donnees=$rep->fetch();
        return $donnees;
    }
    // modifier le stock et dispo
    function mod_stk($stk,$livre){
        global $bdd;
        $req = $bdd-> query ('UPDATE livres SET stock = "'.$stk.'" WHERE id = '.$livre);
    }

    function mod_dispo($dispo,$livre){
        global $bdd;
        $req = $bdd-> query ('UPDATE livres SET dispo = "'.$dispo.'"WHERE id = '.$livre);
    }
    // recuperer une commande 
    function get_commandes($id){
        global $bdd;
        $rep = $bdd->query('SELECT *, commandes.id as id_comm FROM commandes,livres WHERE livres.id = id_livre and id_uti = '.$id.' and livraison = "non livré" ORDER BY commandes.id DESC ');
        return $rep;
    }
    // supp une commande
    function supp($id,$uti){
		global $bdd;
        $comm = rech_com($id,$uti);
        $up = $bdd-> query ('UPDATE livres SET stock = stock+'.$comm['nb_l'].' WHERE id = "'.$comm['id_livre'].'"');
        $rep = $bdd->query ('DELETE FROM commandes WHERE id='.$id.' and id_uti='.$uti);
	}
    // get livres louerd 
    function getComm_louer($id){
        global $bdd;
        $rep = $bdd->query('SELECT *, commandes.id as id_comm FROM commandes,livres WHERE livres.id = id_livre and id_uti = '.$id.' and livraison = "livré" and etat="Louer" ORDER BY commandes.id DESC ');
        return $rep;
    }

?>
