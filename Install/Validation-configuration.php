<?php
if( !empty($_POST['host']) && !empty($_POST['port']) && !empty($_POST['user']) 
	&& isset($_POST['password']) && !empty($_POST['database_name']) ) {
	// On récupère les données dans des variables et on les vérifie
	$host = $_POST['host'];
	$port = $_POST['port'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$databaseName = $_POST['database_name'];

	// On essaye de se connecter à la base de données avec les données reçu
	try {
        $pdo = new PDO("mysql:host=".$host.";dbname=".$databaseName.";port=".$port, $user, $password);
	} catch(Exception $e) {
		require "./ErreurConnexionBDD.php";
		die();
	}

	// Si la connexion à fonctionné, on charge le fichier SQL et on execute le contenu
	$sqlFile = "../setupmyweb.sql";
    $req="";
    $req=file_get_contents ($sqlFile);
    $pdo->query($req);

	// On vérifie si les données ont bien été créé
    $is_table=$pdo->query("SHOW TABLES LIKE 'users'");
    echo "Row:" .$is_table->rowCount();
}
