<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Configuration de Setup-My Website</title>
	<meta name="description" content="Page d'installation de Setup-My Website, étape 2">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
	</header>
	<section>
		Veuillez indiquer les informations de la base de données : 
		<br>
		<form action="Validation-configuration.php" method="post">
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
</body>
</html>   