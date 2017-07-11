<?php

class IndexController{
    public function indexAction($params){
        $view = new View("index", "frontend");
        $view->assign("page_title", "Page d'accueil");
        $view->assign("page_description", "Ceci est la page d'accueil");
    }
}