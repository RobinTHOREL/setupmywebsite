<?php
	session_start();
	// On charge les constantes
	require "Config/config_inc.php";
	
	// Charge les classes du Core
	spl_autoload_register(function ($class){
		if(file_exists(CORE_PATH.$class.".class.php")){
			include CORE_PATH.$class.".class.php";
		} else if (file_exists(MODELS_PATH.$class.".class.php")) {
			include MODELS_PATH.$class.".class.php";
		}

	});
	
	// On lance le routage ou l'installation si la configuration personnalisé n'existe pas
	if(file_exists("config/config_perso_inc.php")) {
        require CONFIG_PERSO_FILE;
        Helpers::loadOptionsFromDatabase();
        $route = new Routing();
    } else {
        $uriInstall = preg_replace("#".BASE_PATH_PATTERN."#i", "", $_SERVER["REQUEST_URI"], 1);
        $uriInstallExp = explode("/",  trim($uriInstall, "/")   );

        if($uriInstallExp[0]=="smw-admin" && $uriInstallExp[1]=="install") {
            $route = new Routing();
        } else {
            header('Location: '.ABSOLUTE_PATH_BACK.'install/');
        }
    }
