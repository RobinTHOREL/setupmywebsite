<?php
class Routing{

	private $uriExploded;
	private $controller;
	private $controllerName;
	private $action;
	private $actionName;
	private $error;
	private $smwAdmin = false;
	private $params;

	public function __construct(){
		$uri = $_SERVER["REQUEST_URI"];
		$uri = preg_replace("#".BASE_PATH_PATTERN."#i", "", $uri, 1);
		$this->uriExploded = explode("/",  trim($uri, "/")   );
        // Check if url contain smw-admin
        $check = preg_match("/smw-admin/i", $uri);
        if($check != false)
        {
            //Search smw-admin si oui:
            $this->smwAdmin=true;
            unset($this->uriExploded[0]);
        }


		$this->setController();
		$this->setAction();
		$this->setParams();
		$this->runRoute();

	}

	public function setController(){
	    $indexController = ($this->smwAdmin)?1:0;
        $this->controller = (empty($this->uriExploded[$indexController]))?"Index":ucfirst($this->uriExploded[$indexController]);
        $this->controllerName = $this->controller."Controller";
        unset($this->uriExploded[$indexController]);

	}

	public function setAction(){
        $indexAction = ($this->smwAdmin)?2:1;
        $this->action =  (empty($this->uriExploded[$indexAction]))?"index":$this->uriExploded[$indexAction];
        $this->actionName = $this->action."Action";
        unset($this->uriExploded[$indexAction]);


	}

	public function setParams(){
		$this->params = array_merge(array_values($this->uriExploded), $_POST);
	}


	public function checkRoute(){
        $pathToCheck = ($this->smwAdmin)?CONTROLLERS_PATH_BACK:CONTROLLERS_PATH_FRONT;
		$pathController = $pathToCheck.$this->controllerName.".class.php";
		if( !file_exists($pathController) ){
            $this->error = "Le fichier du controller n'existe pas.<br>";
			return false;
		}
		include $pathController;

		if ( !class_exists($this->controllerName)  ){
            $this->error = "Le fichier du controller existe mais il n'y a pas de classe.<br>";
			return false;
		}
		if(  !method_exists($this->controllerName, $this->actionName) ){
            $this->error = "L'action n'existe pas";
			return false;
		}
		return true;
	}


	public function runRoute(){
		if($this->checkRoute()){
			$controller = new $this->controllerName();
			$controller->{$this->actionName}($this->params);
		}else{
			$this->page404($this->error);
		}
	}

	public function page404($error){
	    $view = null;
	    // Charge une vue différente en fonction de l'environnement utilisé
	    if($this->smwAdmin) {
	        $view = new View("errors/404", "smw-admin");
	    } else {
	        $view = new View("errors/404", "frontend");
	    }
	    $view->assign("error", $error);
	    $view->assign("page_title", "Erreur 404 - La page demandé n'existe pas");
	    $view->assign("page_description", "La page est introuvable");
	}


}




