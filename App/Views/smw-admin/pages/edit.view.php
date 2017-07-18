    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 title">
                <h2>Editer une page</h2>
            </div>
            <?php if($pageExist) { ?>
                <div class="row"> <!-- exemple - ligne 2 -->
                    <form action="" method="post">
                        <div class="col-7">
                            <input type="text" name="title" class="form-group col-4 col-offset-1" placeholder="Titre de la page" value ="<?php echo $page->getName(); ?>">
                        </div> <!-- exemple - ligne 2 -->
                        <div class="col-7">
                            <textarea name="content" class="form-group"><?php echo $page->getDescription(); ?></textarea>
                        </div>
                        <div class="col-4 col-offset-1 right-content">
                            <h2>Actions sur l'article</h2>
                            <input type="checkbox" id="cb1" name="cb" value="" class="form-group">
                            <label for="cb1">Rendre le contenu public</label><br><br>
                            <input type="submit" class="form-group" value="Publier">
                            <input type="reset" class="form-group" value="Annuler">
                        </div>
                        <div class="col-4 col-offset-1 right-content">
                            <h2>Propriétés de la page</h2>
                            <div class="col-10 col-offset-1">
                                <label>Page parente</label>
                                <select name="" class="form-group">
                                    <option>(pas de parent)</option>
                                </select><br>
                                <label>Style</label>
                                <select name="" class="form-group">
                                    <option>Style par défaut</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } else { ?>
                <div class="row">
    				La page n'existe pas.
                </div>
        	<?php } ?>
        </div>
    </div>
