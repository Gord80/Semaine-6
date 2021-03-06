<div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card light-green lighten-5">
                    <div class="card-content">
                        <span class="card-title">Détail du produit <?= $produits->pro_libelle ?> :</span>
                        <form method="POST" action="#" enctype="multipart/form-data">   
                            <div class="row">
                                <div class="col s6" id="prev">
                                    <img src="<?= ?>" alt="image de <?= $produits->pro_libelle ?>" class="pic2">
                                </div>
                                <div class="col s6">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="id" type="text" name="id" class="" disabled value="<?= $produits->pro_id ?>">
                                            <label for="id">ID</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="pro_cat_id" id="categories">
                                                <option value="" disabled selected>Choisissez une catégorie</option>
                                                <?php
                                                foreach ($categoriesList as $cat)
                                                {
                                                    ?>
                                                    <option value="<?= $cat->cat_id ?>"<?= isset($_POST['pro_cat_id']) && $_POST['pro_cat_id'] == $cat->cat_id || ($cat->cat_id == $produits->pro_cat_id) ? 'selected' : '' ?>><?= $cat->cat_nom ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="categories">Catégorie</label>
                                            <?php
                                            if (form_error('pro_cat_id') != NULL)
                                            {
                                                ?>
                                                <span class="new badge"><?= form_error('pro_cat_id') ?></span>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="ref" type="text" name="pro_ref" class="" value="<?= set_value('pro_ref') != NULL ? set_value('pro_ref') : $produits->pro_ref ?>">
                                            <label for="ref">Référence</label>
                                            <?php
                                            if (form_error('pro_ref') != NULL)
                                            {
                                                ?>
                                                <span class="new badge"><?= form_error('pro_ref') ?></span>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="label" type="text" name="pro_libelle" class="" value="<?= set_value('pro_libelle') != NULL ? set_value('pro_libelle') : $produits->pro_libelle ?>">
                                            <label for="label">Libellé</label>
                                            <?php
                                            if (form_error('pro_libelle') != NULL)
                                            {
                                                ?>
                                                <span class="new badge"><?= form_error('pro_libelle') ?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="pro_couleur" class="" value="<?= set_value('pro_couleur') != NULL ? set_value('pro_couleur') : $produits->pro_couleur ?>">
                                    <label for="color">Couleur</label>
                                    <?php
                                    if (form_error('pro_couleur') != NULL)
                                    {
                                        ?>
                                        <span class="new badge"><?= form_error('pro_couleur') ?></span>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="pro_stock" class="" value="<?= set_value('pro_stock') != NULL ? set_value('pro_stock') : $produits->pro_stock ?>">
                                        <label for="stock">Stock</label>
                                        <?php
                                        if (form_error('pro_stock') != NULL)
                                        {
                                            ?>
                                            <span class="new badge"><?= form_error('pro_stock') ?></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="pro_prix" class="" value="<?= set_value('pro_prix') != NULL ? set_value('pro_prix') : $produits->pro_prix ?>">
                                        <label for="price">Prix</label>
                                        <?php
                                        if (form_error('pro_prix') != NULL)
                                        {
                                            ?>
                                            <span class="new badge"><?= form_error('pro_prix') ?></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Insérer une photo</span>
                                            <input type="file" name="pro_photo" id="upload">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" id="file">
                                        </div>
                                        <span class="info">Au format .gif, .jpg, .jpeg, .pjpeg ou .png</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <textarea id="description" class="materialize-textarea" name="pro_description"><?= set_value('pro_description') != NULL ? set_value('pro_description') : $produits->pro_description ?></textarea>
                                        <label for="description">Description</label>
                                        <?php
                                        if (form_error('pro_description') != NULL)
                                        {
                                            ?>
                                            <span class="new badge"><?= form_error('pro_description') ?></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row valign-wrapper left-align">
                                <div class="col s2 radio">
                                    <p>Produit bloqué :</p>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="pro_bloque" type="radio" value="1" <?= $produits->pro_bloque == 1 ? 'checked' : '' ?>>
                                        <span>Oui</span>
                                    </label>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="pro_bloque" type="radio" value="2" <?= ($produits->pro_bloque == NULL) || ($produits->pro_bloque == 2) ? 'checked' : '' ?>>
                                        <span>Non</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <p>Date d'ajout : <?= $produits->pro_d_ajout ?></p>
                                </div>
                                <div class="col s6">
                                    <p>Date de modification : <?= $produits->pro_d_modif == NULL ? 'Pas de modification enregistrée' : $produits->pro_d_modif ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s4 center-align">
                                    <input type="submit" value="Modifier le produit" class="waves-effect waves-light btn">
                                </div>
                                <div class="col s4 center-align">
                                    <a type="submit" name="delete" id="delete" href="#modal<?= $produits->pro_id ?>" class="waves-effect waves-light btn modal-trigger red accent-4">Effacer le produit</a>
                                </div>
                                <div class="col s4 center-align">
                                    <a href="<?= site_url('Produits/liste') ?>" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>