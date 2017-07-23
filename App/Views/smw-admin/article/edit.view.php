    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 col-offset-1 title">
                <h2>Editer un article</h2>
                <?php if (isset($listOfErrors)) { ?>
            		<?php foreach($listOfErrors as $error) { ?>
                		<div class="col-10">
                			<h3><?php echo $error ?></h3>
                		</div>
            		<?php } ?>
            	<?php } ?>
            </div>
        </div>
        <?php if($postExist) { ?>
        <div class="row"> <!-- exemple - ligne 2 -->
            <form action="" method="post">
                <div class="col-7">
                    <input type="text" name="title" value="<?php echo $post->getTitle() ?>" class="form-group col-4 col-offset-1" placeholder="Titre de l'article" maxlength="255">
                </div> <!-- exemple - ligne 2 -->
                <div class="col-7">
                    <textarea name="content" class="form-group"><?php echo $post->getContent() ?></textarea>
                </div>
                <div class="col-4 col-offset-1 right-content">
                    <h2>Sélection d'une page parent</h2>
                    <div class="col-10 col-offset-1">
                        <label>Page parente</label>
                        <select name="pages_id" class="form-group">
                        	<option value="0">(Pas de parent)</option>                    	
                        	<?php 
                        	if(isset($pages)) {
                        	    foreach($pages as $page) { 
                        	        $selected = "selected='selected'";
                        	        $option = "<option value='".$page['id']."' ";
                        	        if($post->getPagesId() == $page['id']) {
                        	           $option .= $selected;
                        	        }
                        	        $option .= ">".$page['title']."</option>";
                        	        echo $option;
                            	}
                        	}
                        	?>
                        </select>
                    </div>
                </div>
                <div class="col-4 col-offset-1 right-content">
                    <h2>Option de l'article</h2>
                    <input type="checkbox" 
                        id="cb1" 
                        name="show_date" 
                        class="form-group" 
                        <?php echo ($post->getShowDate()=="1")?"checked='checked'":""; ?>
                        >
                    <label for="cb1">Afficher l'heure de publication</label><br><br>
                </div>
                <div class="col-4 col-offset-1 right-content">
                    <h2>Actions sur l'article</h2>
                    <input type="submit" class="form-group" value="Editer">
                    <input type="reset" class="form-group" value="Annuler">
                </div>
            </form>
        </div>
        <?php } else { ?>
            <div class="row">
            	<div class="col-10 col-offset-1">
					L'article n'existe pas.
				</div>
            </div>
        <?php } ?>
    </div>
