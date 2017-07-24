<?php
/* Chargement dynamique des bases */
$docRootExp = explode("/", $_SERVER['DOCUMENT_ROOT']);
$baseDocuments = "";
foreach($docRootExp as $str)  {
	$baseDocuments .= $str.DIRECTORY_SEPARATOR;
}

$phpSelfExp = explode("/",  $_SERVER['PHP_SELF']);
$base = "/";
$basePattern = "\/";
foreach($phpSelfExp as $str)  {
	if($str != "" && strtolower($str) != "index.php") {
		$base .= $str."/";
		$basePattern .= $str."\/";
		$baseDocuments .= $str.DIRECTORY_SEPARATOR;
	}
}
define("BASE_DOCUMENTS", $baseDocuments);
define("BASE_ABSOLUTE_PATTERN", $base);
define("BASE_PATH_PATTERN", $basePattern);

/* Constante de l'application */
define("DS", DIRECTORY_SEPARATOR);

/* Protocole */
if($_SERVER['HTTPS']) {
    define("HTTP_TYPE", "https");
} else {
    define("HTTP_TYPE", "http");
}
/* Absolute Paths Constants */
define("BASE_ABSOLUTE_BACKOFFICE", "smw-admin/");
define("ABSOLUTE_PATH_BACK", HTTP_TYPE."://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN.BASE_ABSOLUTE_BACKOFFICE);
define("ABSOLUTE_PATH_FRONT", HTTP_TYPE."://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN);

define("DEBUG_MODE", true);
define("PRODUCTION_MODE", true);
define("BASE_BACK_OFFICE", "smw-admin".DS);

/* Liens des dossiers */
define("CORE_PATH", "Core".DS);
define("APP_PATH", "App");
define("CONTROLLERS_PATH_BACK", APP_PATH.DS."Controllers".DS."Back".DS );
define("CONTROLLERS_PATH_FRONT", APP_PATH.DS."Controllers".DS."Front".DS );
define("MODELS_PATH", APP_PATH.DS."Models".DS);
define("VIEWS_PATH", APP_PATH.DS."Views".DS);
define("TEMPLATES_PATH", APP_PATH.DS."Views".DS."templates".DS."Default".DS);
define("PUBLIC_PATH", "Public");
define("UPLOAD_PATH", PUBLIC_PATH.DS."upload".DS);
define("LOG_PATH", "Logs".DS);

/* Lien du fichier d'installation de la base de données */
define("INSTALL_DATABASE_FILE", "Install".DS."setupmywebsite.sql");

/* Lien du fichier de configuration personnalisé */
define("CONFIG_PERSO_FILE", "Config".DS."config_perso_inc.php");
