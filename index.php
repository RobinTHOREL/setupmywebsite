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
        $route = new Routing();
    } else {
        header("Location: install/index.php");
    }


