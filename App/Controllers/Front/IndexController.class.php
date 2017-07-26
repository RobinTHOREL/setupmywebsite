<?php

class IndexController
{
    public function indexAction($params)
    {
        $view = new View("index", "homepage");
        $view->assign("page_title", "Page d'accueil");
        $view->assign("page_description", "Ceci est la page d'accueil");
        $view->assign("main_title", MAIN_TITLE);
    }


}