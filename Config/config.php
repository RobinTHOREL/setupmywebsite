<?php

/* Constante de l'application */
define("DS", DIRECTORY_SEPARATOR);
define("BASE_PATH_PATTERN", "\/setupmywebsite\/");
define("DEBUG_MODE", true);
define("BASE_BACK_OFFICE", "smw-admin\/");
/* Liens des dossiers */
define("CORE_PATH", "Core".DS);
define("APP_PATH", "App");
define("CONTROLLERS_PATH", APP_PATH.DS."Controllers".DS);
define("MODELS_PATH", APP_PATH.DS."Models".DS);
define("VIEWS_PATH", APP_PATH.DS."Views".DS);
define("LOG_PATH", "Logs".DS);


/* Base de données */
define("DB_USER", "root");
define("DB_PWD", "password");
define("DB_HOST", "localhost");
define("DB_NAME", "setupmyweb");
define("DB_PORT", "3306");