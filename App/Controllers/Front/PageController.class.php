<?php

class PageController
{
    public function viewAction($params)
    {

        if (!empty($params[0])) {
            $pages = new Pages();
            $thisPage = $pages->populate(["id" => $params[0]]);
            $view = new View("index", $pages->getTemplate());
            $option = new Options();
            $main_title = $option->populate(["id" => 1]);
            $view->assign("pages", $pages);
            $view->assign("main_title", $option->getTitle());
            $view->assign("page_title", $pages->getName());
            $view->assign("page_description", $pages->getDescription());

        }


    }
}