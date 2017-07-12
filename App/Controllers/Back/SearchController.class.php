<?php
class SearchController{
    public function viewAction($params){
        $view = new View("login", "login");
        $view->assign("page_title", "Page de connexion");
        $view->assign("page_description", "Page de connexion");
    }
}