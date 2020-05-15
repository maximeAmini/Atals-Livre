<div class="modal fade" id="alert_anul<?php echo $commande['id_comm']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Alert</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="text-align:center; font-weight:bold">Etes-vous sur de votre choix? <br />Cette action est irréversible.</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="listeCommandes_controleur.php?supp=<?php echo $commande['id_comm']; ?>" style="color:white">supprimer</a>
                <button class="btn btn-primary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
