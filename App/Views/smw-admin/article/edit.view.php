    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 col-offset-1 title">
                <h2>Editer un article</h2>
            </div>
        </div>
        <?php if($postExist) { ?>
            <div class="row">
            	<form action="" method="post">
                    <div class="col-7">
                        <input type="text" name="title" class="form-group col-4 col-offset-1" placeholder="Titre de l'article" value="<?php echo $post->getTitle(); ?>">
                    </div> <!-- exemple - ligne 2 -->
                    <div class="col-7">
                        <textarea name="content" class="form-group"><?php echo $post->getContent(); ?></textarea>
                    </div>
                    <div class="col-4 col-offset-1 right-content">
                        <h2>Actions sur l'article</h2>
                        <input type="checkbox" id="cb1" name="cb" value="" class="form-group" checked="checked">
                        <label for="cb1">Activer les commentaires</label><br>
                        <input type="checkbox" id="cb3" name="cb" value="" class="form-group">
                        <label for="cb3">Indiqué le statut modifié ainsi date et l'heure de la modification</label><br><br>
                        <input type="submit" class="form-group" value="Publier">
                        <input type="reset" class="form-group" value="Annuler">
                    </div>
            	</form>
                <div class="col-4 col-offset-1 right-content">
                    <h2>Catégorise de l'article</h2>
                    <input type="checkbox" id="cb1" name="cb" value="" class="form-group">
                    <label for="cb1">base</label><br>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
				L'article n'existe pas.
            </div>
        <?php } ?>
    </div>
