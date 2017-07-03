<?php

/* Constante de l'application */
define("DS", DIRECTORY_SEPARATOR);
define("BASE_PATH_PATTERN", "\/setupmywebsite\/");

//Absolute Paths Constants
define("BASE_ABSOLUTE_PATTERN", "/setupmywebsite/");
define("BASE_ABSOLUTE_BACKOFFICE", "smw-admin/");
define("ABSOLUTE_PATH", "http://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN.BASE_ABSOLUTE_BACKOFFICE);

define("DEBUG_MODE", true);
define("BASE_BACK_OFFICE", "smw-admin".DS);

/* Liens des dossiers */
define("CORE_PATH", "Core".DS);
define("APP_PATH", "App");
define("PUBLIC_PATH", "Public");
define("CONTROLLERS_PATH", APP_PATH.DS."Controllers".DS);
define("MODELS_PATH", APP_PATH.DS."Models".DS);
define("VIEWS_PATH", APP_PATH.DS."Views".DS);
define("LOG_PATH", "Logs".DS);

/* Lien du fichier d'installation de la base de données */
define("INSTALL_DATABASE_FILE", "Install".DS."setupmywebsite.sql");