	<div class="row"> <!-- exemple - ligne 1 -->
		<div class="col-10 title">
			<header>
				<?php
				if(isset($_SESSION["error_form"])){
					foreach ($_SESSION["error_form"] as $error) {
						echo "<li>".$error;
					}
					unset($_SESSION["error_form"]);
				}
				?>
			</header>
		</div>
		<div class="col-12">

			<div class="logo">
				<i class="fa fa-cog"></i>
			</div>
			<p class="smw">SMW-ADMIN</p>
			<h1>Information de la base de données</h1>
		</div>
		<div class="row"> <!-- exemple - ligne 2 -->
			<div class="col-6 col-offset-3">
				<form action="" method="POST">
					<label for="adresse"> Adresse :<br>
						<input type="text" class="form-group" name="host" value="localhost">
					</label>
					<label for="port"> Port :<br>
						<input type="text" class="form-group" name="port" value="3306" required="required">
					</label>
					<label for="user">Utilisateur :<br>
						<input type="text" class="form-group" name="user" value="root" required="required">
					</label>
					<label for="mdp">Mot de passe : <br>
						<input type="text" class="form-group" name="password" value="">
					</label>
					<label for="nomBase">Nom de la base de donnée : <br>
						<input type="text" class="form-group" name="database_name" value="setupmywebsite" required="required">
					</label>
					<br><br>
					<div class="col-12">
						<input type="submit" value="Envoyer">
					</div>

				</form>
			</div> <!-- exemple - ligne 2 -->
		</div>
	</div>