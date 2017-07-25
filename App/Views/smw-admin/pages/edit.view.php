
    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 col-offset-1 title">
                <h2>Créer une page</h2>
                <?php if (isset($listOfErrors)) {
            		foreach($listOfErrors as $error) {
                		echo "<div class='col-10'><h3>".$error."</h3></div>";
            		}
            	} ?>
            	<?php if (isset($success)) {
            	    echo "<div class='col-10'><h3>".$success."</h3></div>";
            	} ?>
            </div>
            <?php if(isset($pageExist) && $pageExist) { ?>
                <div class="row">
                    <form action="" method="post">
                        <div class="col-7">
                        	<label for="title_page_input">Titre</label><br>
                            <input type="text" 
                            	id="title_page_input"
                                name="title" 
                                class="form-group col-4 col-offset-1" 
                                placeholder="Titre de la page" 
                                maxlength="512"
                                value="<?php echo $page->getTitle();?>"
                                required="required"
                                ><br><br>
                            <label for="cb1">Description</label><br>
                            <input type="text" 
                                id="title_page_input"
                                name="description" 
                                class="form-group col-4 col-offset-1" 
                                placeholder="Description de la page" 
                                maxlength="255"
                                value="<?php echo $page->getDescription();?>"
                                ><br>
                        </div>
                        <div class="col-4 col-offset-1">
                            <div class="col-12 right-content">
                                <h2>Propriétés de la page</h2>
                                <div class="col-10 col-offset-1">
                                <input type="checkbox" 
                                    id="is_published_label" 
                                    name="is_published" 
                                    value="1" 
                                    class="form-group" 
                                    <?php echo ($page->getIsPublished()=="1")?"checked='checked'":""; ?>
                                >
                                <label for="is_published_label">Rendre le contenu public</label><br><br>
                                </div>
                            </div>
                            <div class="col-12 right-content">
                                <h2>Actions sur l'article</h2>
                                <input type="submit" class="form-group" value="Publier">
                                <input type="reset" class="form-group" id="cancel-btn" value="Annuler">
                            </div>
                        </div>
                    </form>
                </div>
            <?php } else { ?>
                <div class="row">
					<div class="col-10 col-offset-1">
    					La page n'existe pas.
    				</div>
                </div>
        	<?php } ?>
        </div>
    </div>
