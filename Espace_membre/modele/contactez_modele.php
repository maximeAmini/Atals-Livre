<?php
	function message($id_u,$message){
		global $bdd;
		$rep=$bdd->prepare('INSERT INTO message(id_u,message,vue,date) VALUES(:id_u,:message,0,NOW())');
		$rep->execute(array(
			'id_u'=>$id_u,
			'message'=>$message
		));
	}
?>
