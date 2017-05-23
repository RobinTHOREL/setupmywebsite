
<?php
if( $_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['user'])
		&& !empty($_POST['password']) && !empty($_POST['email']) ) {

	session_start();
	if(isset($_SESSION["error_form"])) {
		unset($_SESSION["error_form"]);
	}

	// On récupère les données dans des variables
	$user = $_POST['user'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	$error = false;
	$listOfErrors = [];

	// Vérification du user
	if(strlen($user)>32) {
		array_push($listOfErrors, "Le user saisie n'est pas valide.");
		$error = true;
	}
	
	// Vérification du mot de passe
	if(strlen($password)>32) {
		array_push($listOfErrors, "Le mot de passe saisie n'est pas valide.");
		$error = true;
	}
	
	// Vérification de l'email
	if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
		array_push($listOfErrors, "L'email saisie n'est pas valide.");
		$error = true;
	}

	// On essaye de se connecter à la base de données avec les données reçues
	if($error == false) {
		try {
			$pdo = new PDO("mysql:host=".$host.";dbname=".$databaseName.";port=".$port, $user, $password);
		} catch(Exception $e) {
			array_push($listOfErrors, "Erreur de connexion à la base de données. Veuillez vérifier vos paramètres de connexion.");
			$error = true;
		}
	} 
	if($error == true) {
		$_SESSION["error_form"] = $listOfErrors;
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		die();
	}

	// On créé l'utilisateur dans la base à partir des informations récupéré
} 
die("Accès interdit.");