<?php
	session_start();
	require "config/config_inc.php";

	spl_autoload_register(function ($class){
		if(file_exists(CORE_PATH.$class.".class.php")){
			include CORE_PATH.$class.".class.php";
		} else if (file_exists(MODELS_PATH.$class.".class.php")) {
			include MODELS_PATH.$class.".class.php";
		}

	});

	if(file_exists("config/config_perso_inc.php")) {
        require CONFIG_PERSO_FILE;
        $route = new Routing();
    } else {
        // Lancement de l'installation si la configuration personnalisé n'existe pas
        $uriInstall = preg_replace("#".BASE_PATH_PATTERN."#i", "", $_SERVER["REQUEST_URI"], 1);
        $uriInstallExp = explode("/",  trim($uriInstall, "/")   );
        if($uriInstallExp[0]=="smw-admin" && $uriInstallExp[1]=="install") {
            $route = new Routing();
        } else {
            header("Location: smw-admin/install/");
        }
    }


