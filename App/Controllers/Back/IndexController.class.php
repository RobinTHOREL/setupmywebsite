<?php
class IndexController{
	public function indexAction($params){
        $view = new View(BASE_BACK_OFFICE."index", "smw-admin");
        $view->assign("page_title", "Page d'accueil de Setup My Website");
        $view->assign("page_description", "Ceci est la page d'accueil du back office");
	}
}