<?php
class SettingsController{
    public function viewAction($params){
        $view = new View(BASE_BACK_OFFICE."settings/index", "smw-admin");
        $view->assign("page_title", "Voir les réglages");
        $view->assign("page_description", "Page listant les réglages");
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."settings/edit", "smw-admin");
        $view->assign("page_title", "Editer les réglages");
        $view->assign("page_description", "Page d'édition des réglages");
    }
}