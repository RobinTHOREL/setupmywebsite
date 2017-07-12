<?php
class PagesController{
    public function addAction($params){
        $view = new View(BASE_BACK_OFFICE."pages/add", "smw-admin");
        $view->assign("page_title", "Ajouter une nouvelle page");
        $view->assign("page_description", "Page d'ajout de nouvelle page");
    }

    public function viewAction($params){
        $view = new View(BASE_BACK_OFFICE."pages/index", "smw-admin");
        $view->assign("page_title", "Voir les pages");
        $view->assign("page_description", "Page listant les pages");
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."pages/edit", "smw-admin");
        $view->assign("page_title", "Editer une page");
        $view->assign("page_description", "Page d'édition d'une page");
    }

    public function deleteAction($params){
        $view = new View(BASE_BACK_OFFICE."pages/delete", "smw-admin");
        $view->assign("page_title", "Supprimer une page");
        $view->assign("page_description", "Page de suppression d'une page");
    }
}