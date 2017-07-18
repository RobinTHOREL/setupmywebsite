<?php
/**
 * Created by PhpStorm.
 * User: younesdiouri
 * Date: 18/07/2017
 * Time: 11:15
 */
class LogoutController
{
    public function indexAction($params)
    {
        unset($_SESSION['login']);
        $view = new View("index", "frontend");
        $view->assign("page_title", "Decconnexion");
        $view->assign("page_description", "Vous vous êtes bien déconenctés");
    }
}