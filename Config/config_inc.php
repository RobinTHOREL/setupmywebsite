<?php

/* Constante de l'application */
define("DS", DIRECTORY_SEPARATOR);
define("BASE_PATH_PATTERN", "\/setupmywebsite\/");

//Absolute Paths Constants
define("BASE_ABSOLUTE_PATTERN", "/setupmywebsite/");
define("BASE_ABSOLUTE_BACKOFFICE", "smw-admin/");
define("ABSOLUTE_PATH_BACK", "http://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN.BASE_ABSOLUTE_BACKOFFICE);
define("ABSOLUTE_PATH_FRONT", "http://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN);

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
define("CONFIG_PERSO_FILE", "config".DS."config_perso_inc.php");

/* Default template */
define("CHOSEN_TEMPLATE", "SweetEighteen");