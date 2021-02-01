<div id="modal<?= $produits->pro_id ?>" class="modal">
    <div class="modal-content">
        <h4>Suppression de <?= $produits->pro_libelle ?></h4>
        <p>Etes-vous sûr de bien vouloir supprimer le produit <?= $produits->pro_libelle ?> ?</p>
        <p>Cette suppression sera irréversible et vous pourrez plus retrouver ce produit.</p>
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col s3 offset-s6">
                <a href="<?= ?>" class="modal-close waves-effect waves-green btn red accent-4">Confirmer</a>
            </div>
            <div class="col s3">
                <a href="#!" class="modal-close waves-effect waves-green btn cyan accent-4">Annuler</a>
            </div>
        </div>
    </div>
</div>