<div class="container">
    <div class="row"> <!-- exemple - ligne 1 -->
        <div class="col-10 col-offset-1 title">
            <h2>Ajouter un article</h2>
            <?php if (isset($listOfErrors)) { ?>
        		<?php foreach($listOfErrors as $error) { ?>
            		<div class="col-10">
            			<h3><?php echo $error ?></h3>
            		</div>
        		<?php } ?>
        	<?php } ?>
        </div>
    </div>
    <div class="row"> <!-- exemple - ligne 2 -->
        <form action="" method="post">
            <div class="col-7">
                <input type="text" name="title" class="form-group col-4 col-offset-1" placeholder="Titre de l'article" maxlength="255">
            </div> <!-- exemple - ligne 2 -->
            <div class="col-7">
                <textarea name="content" class="form-group"></textarea>
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
                    	        echo "<option value='".$page['id']."'>".$page['title']."</option>";
                        	}
                    	}
                    	?>
                    </select>
                </div>
            </div>
            <div class="col-4 col-offset-1 right-content">
                <h2>Option de l'article</h2>
                <input type="checkbox" id="cb1" name="show_date" class="form-group" checked="checked">
                <label for="cb1">Afficher l'heure de publication</label><br><br>
            </div>
            <div class="col-4 col-offset-1 right-content">
                <h2>Actions sur l'article</h2>
                <input type="submit" class="form-group" value="Editer">
                <input type="reset" class="form-group" value="Annuler">
            </div>
        </form>
    </div>
</div>
