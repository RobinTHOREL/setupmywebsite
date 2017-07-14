<header>
	<?php
		if(isset($_SESSION["error_form"])){
			foreach ($_SESSION["error_form"] as $error) {
				echo "<li>".$error;
			}
			unset($_SESSION["error_form"]);
		}
	?>
    <h1>Création de la base de données</h1>
</header>
<section>
	Veuillez indiquer les informations de la base de données : 
	<br>
	<form action="" method="post">
		<label>
			Adresse :<br>
			<input type="text" name="host" value="localhost" required="required">
		</label>
		<br>
		<label>
			Port :<br>
			<input type="text" name="port" value="3306" required="required">
		</label>
		<br>
		<label>
			Utilisateur :<br>
			<input type="text" name="user" value="root" required="required">
		</label>
		<br>
		<label>
			Mot de passe :<br>
			<input type="text" name="password" value="">
		</label>
		<br>
		<label>
			Nom de la base de données à utiliser :<br>
			<input type="text" name="database_name" value="setupmywebsite" required="required">
		</label>
		<br><br>
		<input type="submit" value="Envoyer">
	</form>
</section>
<footer>
</footer>
