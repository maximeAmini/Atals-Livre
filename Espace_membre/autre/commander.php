<div class="modal fade" id="infos<?php if(isset($pan)){ echo $livre['id_pan']; } ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmez la commande</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="livre_controleur.php?livre=<?php echo $livre['id']; ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4" style="text-align:right;" pattern="#^0[1-68][0-9]{8}$#">Numéro :</label>
                        <div class="col-sm-6">
                            <input type="tel" class="form-control " name="num" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-lg-4" style="text-align:right;">Vous voulez : </label>
                        <label for="oui" class="radio col-lg-3 col-lg-offset-1" style="margin-left:20px;">
                            <input type="radio" onclick="rep1()" name="type" id="oui" value="Acheter" <?php if($livre['stock']==0){echo 'disabled'; } else{ echo 'checked '; }  ?> onclick="rep1()" />Acheter
                        </label>
                        <label for="non" class="radio col-lg-3" style="margin-left:20px;">
                            <input type="radio" name="type" id="non" value="Louer" <?php if($livre['dispo']=="non"){echo 'disabled'; }  ?> onclick="rep2()">Louer
                        </label>
                    </div>

                    <div class="form-group row nb_l">
                        <label class="col-sm-4" style="text-align:right;">nombre de livres :</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control nb_lIn" name="nb" required="" min=1 max="<?php echo $livre['stock']; ?>" />
                        </div>
                    </div>

                    <div class="form-group row nb_j" style="display:none;">
                        <label class="col-sm-4" style="text-align:right;">nombre de jour :</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control nb_jIn " name="nb_j" min=1 max="30" />
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
<script>
    function rep1() {
        $('.nb_l').css('display', 'flex');
        $('.nb_lIn').prop('required', true);

        $('.nb_j').css('display', 'none');
        $('.nb_jIn').prop('required', false);
    }

    function rep2() {
        $('.nb_l').css('display', 'none');
        $('.nb_lIn').prop('required', false);

        $('.nb_j').css('display', 'flex');
        $('.nb_jIn').prop('required', true);

    }

</script>
