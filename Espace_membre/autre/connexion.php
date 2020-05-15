<div class="modal fade" id="con">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Connexion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="livre_controleur.php?livre=<?php echo $livre['id']; ?>">
                <div class="modal-body">
                    <div class="input-group mb-2 mr-sm-2 offset-lg-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                        </div>
                        <input name="mail" type="email" class="form-control form-control-lg col-lg-8" placeholder="Votre E-Mail">
                    </div>
                    <div class="input-group mb-2 mr-sm-2 offset-lg-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input name="mp" type="password" class="form-control form-control-lg col-lg-8" placeholder="Votre mot de passe">
                    </div>

                    <div class="col-lg-6 offset-lg-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="fas fa-check-circle"></span> connexion </button>
                    </div>

                    <div class="col-lg-12">
                        <p style="font-weight:bold; color:black; text-align:center;">Vous n'avez encore pas de compte ? <a href="inscription_controle.php"> Inscrivez-vous.</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    if( isset( $_POST['mail'] ) and isset( $_POST['mp'] )) { 
        $email = htmlspecialchars($_POST['mail']);
        $pass = htmlspecialchars($_POST['mp']);
        include('../modele/connexion_modele.php');
        $donnees = recherche($email);
        if($donnees != null and sha1($pass)==$donnees['pass']){
            $_SESSION['id'] = $donnees['id'];
            $_SESSION['mail']= $donnees['mail'];
            $_SESSION['pass']= $donnees['pass'];
        }
	}
?>
