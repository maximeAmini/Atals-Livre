<div class="modal fade" id="infos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Changer le mot de passe</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="profile_controleur.php?">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-2">
                            <input type="password" placeholder="Ancien mot de passe" class="form-control " name="old" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-2">
                            <input type="password" placeholder="Nouveau mot de passe" class="form-control " name="new1" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-2">
                            <input type="password" placeholder="Confirmez mot de passe" class="form-control " name="new2" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" value=' Valider ' />
                    <button class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
    if(isset($_POST['old']) and isset($_POST['new1']) and isset($_POST['new2'])){
        $old= htmlspecialchars($_POST['old']);
        $new1=htmlspecialchars($_POST['new1']);
        $new2=htmlspecialchars($_POST['new2']);
        $membre = get_membre($_SESSION['id']);
        if(sha1($old)== $membre['pass'] and $new1==$new2){
            $_SESSION['pass']=sha1($new1);
            mod_mp($_SESSION['id'],sha1($new1));
        }
    }


?>
