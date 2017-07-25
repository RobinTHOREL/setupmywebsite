<?php

class PageController
{
    public function viewAction($params)
    {
        echo "sali";
        if (!empty($params[0])) {
            $pages = new Pages();
            $thisPage = $pages->populate(["id" => $params[0]]);
            $view = new View("index", $pages->getTemplate());
            $view->assign("page_title", $pages->getName());
            $view->assign("page_description", "Ceci est la page d'accueil");
            $option = new Options();
            $main_title = $option->populate(["id" => 1]);
            $view->assign("main_title", $option->getTitle());
            $view->assign("test", $pages->getName());
        }


    }
}