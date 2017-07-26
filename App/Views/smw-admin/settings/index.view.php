    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            	<div class="menuTab">
                	<a href="view" class="active">Global</a>
                	<a href="mailer" class="">Mailer</a>
            	</div>
            <div class="col-10 col-offset-1 title">
                <h2>Modifier les réglages SMW</h2>
            </div>
            <div class="col-10 col-offset-1 title">
                <h3>Réglages du site</h3>
            </div>
            <div class="row"> <!-- exemple - ligne 2 -->
                <div class="col-6 col-offset-3">
                    <input type="text" class="form-group" placeholder="Nom du site" value="<?php echo MAIN_TITLE; ?>">
                    <input type="text" class="form-group" placeholder="Metadonnées">
                    <input type="checkbox" 
                        id="horsligne" 
                        name="cb" 
                        value="" 
                        class="form-group"
                        <?php 
                            if(PRODUCTION_MODE == "true") {
                                echo "checked='checked'";
                            }
                        ?>
                        >
                    <label for="horsligne">Mode hors ligne</label><br>
                </div>
            </div>
        </div>
    </div>