
<?php
if( $_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['host']) && !empty($_POST['port']) && !empty($_POST['user']) 
		&& isset($_POST['password']) && !empty($_POST['database_name']) ) {
	
	session_start();
	if(isset($_SESSION["error_form"])) {
		unset($_SESSION["error_form"]);
	}
	
	// On récupère les données dans des variables
	$host = $_POST['host'];
	$port = $_POST['port'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$databaseName = $_POST['database_name'];
	
	$error = false;
	$listOfErrors = [];
	
	// Vérification de l'hôte
	if(strlen($host)>255) {
		array_push($listOfErrors, "L'hôte saisie n'est pas valide.");
		$error = true;
	}
	
	// Vérification du port
	if($port<0 || $port>65535) {
		array_push($listOfErrors, "Le port saisie n'est pas valide.");
		$error = true;
	}
	
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
	
	// Vérification du nom de la base de données
	/*if($databaseName) {
		array_push($listOfErrors, "Le nom de la base de données n'est pas valide.");
		$error = true;
	}*/
	
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

	// Si la connexion à fonctionné, on charge le fichier SQL et on éxécute le contenu
	$sqlFile = "./File/setupmyweb.sql";
    $req = "";
    $req = file_get_contents ($sqlFile);
    $pdo->query($req);

	// On vérifie si les données ont bien été créé
    $is_table=$pdo->query("SHOW TABLES");
    echo "Row:" .$is_table->rowCount();
	
	// Si la création a bien fonctionné, on continue à la page suivante
	if($is_table->rowCount()>0) {
        $_SESSION["host"] = $host;
        $_SESSION["port"] = $port;
        $_SESSION["user"] = $user;
        $_SESSION["password"] = $password;
        $_SESSION["database_name"] = $databaseName;
		header("Location: Configuration-3.php");
		die();
	} else {
		array_push($listOfErrors, "La création des données dans la base de données n'a pas fonctionné.");
		$_SESSION["error_form"] = $listOfErrors;
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		die();
	}
} 
die("Accès interdit.");