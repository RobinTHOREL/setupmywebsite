<?php
/**
 * Created by PhpStorm.
 * User: younesdiouri
 * Date: 06/07/2017
 * Time: 10:27
 */

class IndexController{
    public function indexAction($params){
        $view = new View("index", "frontend");
        $view->assign("page_title", "Page d'accueil");
        $view->assign("page_description", "Page d'accueil");
        //require VIEWS_PATH."index.view.php";
    }
}