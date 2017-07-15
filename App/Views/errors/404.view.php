<div class="container">
	<div class="row">
		<div class="col-12 title">
			<h2>Erreur 404 : La page demandé n'existe pas.</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-12 center">
			<div class="center-text">
				<a href="<?php echo ABSOLUTE_PATH_FRONT; ?>">Revenir à l'accueil</a>
                <?php
                if (DEBUG_MODE && isset($error)) {
                    echo "<p>".$error."</p><br>";
                }
                ?>
            </div>
        </div>
	</div>
</div>
