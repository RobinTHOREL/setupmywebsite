<div class="container">
    <div class="row"> <!-- exemple - ligne 1 -->
        <div class="col-10 col-offset-1 title">
            <h2>Ajouter un article</h2>
            <?php if (isset($listOfErrors)) {
        		foreach($listOfErrors as $error) {
            		echo "<div class='col-10'><h3>".$error."</h3></div>";
        		}
        	} ?>
        	<?php if (isset($success)) {
        	    echo "<div class='col-10'><h3>".$success."</h3></div>";
        	} ?>
        </div>
    </div>
    <div class="row"> <!-- exemple - ligne 2 -->
        <form action="" method="post">
            <div class="col-7">
                <input type="text" 
                    name="title" 
                    class="form-group col-4 col-offset-1" 
                    placeholder="Titre de l'article" 
                    maxlength="255"
                    value="<?php echo (isset($_SESSION["backup"]["title"]))? $_SESSION["backup"]["title"] : "";?>"
                    >
            </div> <!-- exemple - ligne 2 -->
            <div class="col-7">
                <textarea name="content" class="form-group">
                	<?php echo (isset($_SESSION["backup"]["content"]))? $_SESSION["backup"]["content"] : "";?>
                </textarea>
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
                    	        echo "<option value='".$page['id']."'>".htmlspecialchars($page['title'])."</option>";
                        	}
                    	}
                    	?>
                    </select>
                </div>
            </div>
            <div class="col-4 col-offset-1 right-content">
                <h2>Option de l'article</h2>
                <input type="checkbox" id="cb1" name="show_date" value="1" class="form-group" checked="checked">
                <label for="cb1">Afficher l'heure de publication</label><br><br>
            </div>
            <div class="col-4 col-offset-1 right-content">
                <h2>Actions sur l'article</h2>
                <div class="center-text">
                    <input type="submit" value="Publier">
                    <input type="reset" value="Annuler">
                </div>
            </div>
        </form>
    </div>
</div>

<?php 
    // On supprime les informtions du post en session après les avoir affichés
    if (isset($_SESSION["backup"])) {
        unset($_SESSION["backup"]);
    }
?>
