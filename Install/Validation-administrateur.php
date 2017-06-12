
<?php
// On charge les classes
require_once('../Core/BaseSql.class.php');
require_once('../App/Models/Users.class.php');

if( $_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['user'])
		&& !empty($_POST['password']) && !empty($_POST['email']) ) {

    $error = false;
    $listOfErrors = [];

	session_start();
	if(isset($_SESSION["error_form"])) {
		unset($_SESSION["error_form"]);
	}

	// On vérifie que les informations de connexion à la base de données sont bien présentent
    if(!isset($_SESSION["user"]) || !isset($_SESSION["password"]) || !isset($_SESSION["port"])
        || !isset($_SESSION["port"]) || !isset($_SESSION["port"])) {
        array_push($listOfErrors, "Des informations de connexion sont manquantes");
    } else {
        $host = $_SESSION["host"];
        $port = $_SESSION["port"];
        $user = $_SESSION["user"];
        $password = $_SESSION["password"];
        $databaseName = $_SESSION["database_name"];
    }

	// On récupère les données dans des variables
	$adminLogin = $_POST['user'];
	$adminPassword = $_POST['password'];
	$adminEmail = $_POST['email'];

	// Vérification du user
	if(strlen($adminLogin)>32) {
		array_push($listOfErrors, "Le user saisie n'est pas valide.");
		$error = true;
	}
	
	// Vérification du mot de passe
	if(strlen($adminPassword)>64) {
		array_push($listOfErrors, "Le mot de passe saisie n'est pas valide.");
		$error = true;
	}
	
	// Vérification de l'email
	if(filter_var($adminEmail, FILTER_VALIDATE_EMAIL) == false) {
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

    define("DB_HOST",$host);
    define("DB_NAME", $databaseName);
    define("DB_PORT", $port);
    define("DB_USER", $user);
    define("DB_PWD", $password);
    $user = new Users();
    $user->setLogin($adminLogin);
    $user->setPassword($adminPassword);
    $user->setEmail($adminEmail);
    $user->setFirstName("Name");
    $user->setLastName("Name");
    $user->setActivationKey("N");
    $user->Save();
}
//die("Accès interdit.");