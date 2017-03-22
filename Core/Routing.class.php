<?php
class Routing{

	private $uriExploded;

	private $controller;
	private $controllerName;
	private $action;
	private $actionName;
	private $error;

	private $params;

	public function __construct(){
		$uri = $_SERVER["REQUEST_URI"];
		$uri = preg_replace("#".BASE_PATH_PATTERN."#i", "", $uri, 1);
		$this->uriExploded = explode("/",  trim($uri, "/")   );
		$this->setController();
		$this->setAction();
		$this->setParams();
		$this->runRoute();

	}

	public function setController(){
		$this->controller = (empty($this->uriExploded[0]))?"Index":ucfirst($this->uriExploded[0]);
		$this->controllerName = $this->controller."Controller";
		unset($this->uriExploded[0]);
	}

	public function setAction(){
		$this->action =  (empty($this->uriExploded[1]))?"index":$this->uriExploded[1];
		$this->actionName = $this->action."Action";	
		unset($this->uriExploded[1]);
	}

	public function setParams(){
		$this->params = array_merge(array_values($this->uriExploded), $_POST);
	}


	public function checkRoute(){
		$pathController = CONTROLLERS_PATH.$this->controllerName.".class.php";
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
            if(DEBUG_MODE) {  echo "Action ". $this->actionName . "<br>";  }
            $this->error = "L'action n'existe pas";
			return false;
		}
		return true;
	}


	public function runRoute(){
		if($this->checkRoute()){
			//$this->controllerName = IndexController
			$controller = new $this->controllerName();
			//$this->actionName = indexAction
			$controller->{$this->actionName}($this->params);
		}else{
			$this->page404($this->error);
		}
	}

	public function page404($error){
        require VIEWS_PATH."errors/404.view.php";
        die();
	}


}




