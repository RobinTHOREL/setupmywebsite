    <div class="container">
        <div class="row">
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
                            value="<?php echo (isset($_SESSION["backup"]["title"]))? $_SESSION["backup"]["title"] : "";?>"
                            required="required"
                            ><br><br>
                        <label for="cb1">Description</label><br>
                        <input type="text" 
                            id="title_page_input"
                            name="description" 
                            class="form-group col-4 col-offset-1" 
                            placeholder="Description de la page" 
                            maxlength="255"
                            value="<?php echo (isset($_SESSION["backup"]["description"]))? $_SESSION["backup"]["description"] : "";?>"
                            ><br>
                    </div>
                    <div class="col-4 col-offset-1 right-content">
                        <h2>Propriétés de la page</h2>
                        <div class="col-10 col-offset-1">
                            <label>Template</label>
                            <select name="template" class="form-group">
                                <?php
                                $tempFiles = glob(TEMPLATES_PATH_CUSTOM.'*temp.php');
                                $patterns = array();
                                $patterns[0] = "/(.)*\\".DS."/";
                                $patterns[1] = "/.temp.php/";
                                foreach ($tempFiles as $tempFile)
                                {
                                    $valueTemplate = preg_replace($patterns, '', $tempFile);
                                    echo '<option value="'.$valueTemplate.'">'.ucfirst($valueTemplate).'</option>';
                                }
                                ?>

                            </select><br>
                            <label>Style</label>
                            <select name="" class="form-group">
                                <option>Style par défaut</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php 
    // On supprime les informtions du post en session après les avoir affichés
    if (isset($_SESSION["backup"])) {
        unset($_SESSION["backup"]);
    }
?>
