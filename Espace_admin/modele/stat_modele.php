<?php
    function get_date(){
        global $bdd;
        $req = $bdd->query ('SELECT DISTINCT(date) FROM commandes ORDER BY date  LIMIT 0,6');
        return $req;
    }
    function getNbComDate($date){
        global $bdd;
        $req = $bdd->query ('SELECT count(*) as nb FROM commandes WHERE date="'.$date.'"');
        $donnees=$req->fetch();
        return $donnees['nb'];
    }
    function getNbvisiteDate($date){
        global $bdd;
        $req = $bdd->query ('SELECT count(*) as nb FROM visites WHERE date="'.$date.'"');
        $donnees=$req->fetch();
        return $donnees['nb'];
    }

?>
