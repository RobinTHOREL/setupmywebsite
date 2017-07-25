<?php

class IndexController
{
    public function indexAction($params)
    {
        $view = new View("index", "sweet-one");
        $view->assign("page_title", "Page d'accueil");
        $view->assign("page_description", "Ceci est la page d'accueil");
        $option = new Options();
        $main_title = $option->populate(["id" => 1]);
        $view->assign("main_title", $option->getTitle());
    }


}