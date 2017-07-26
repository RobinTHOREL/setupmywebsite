<?php

class PageController
{
    public function viewAction($params)
    {

        if (!empty($params[0])) {
            $pages = new Pages();
            $posts = new Posts();


            $pages->populate(["id" => $params[0]]);
            $allPost = $posts->getAllBy(["OR" => ["pages_id"=>$params[0]]] );
            $view = new View("index", $pages->getTemplate());
            $view->assign("pages", $pages);
            $view->assign("main_title", MAIN_TITLE);
            $view->assign("page_title", $pages->getTitle());
            $view->assign("page_description", $pages->getDescription());
            $view->assign("posts", $allPost);

        }


    }
}