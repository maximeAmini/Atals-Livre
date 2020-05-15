<div class="modal fade" id="alert_comm<?php if(isset($pan)){ echo $livre['id_pan']; } ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Alert</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="text-align:center; font-weight:bold">Livre deja commander</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
