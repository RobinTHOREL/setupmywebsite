<?php
class CommentsController{
	public function createAction($params){
        $view = new View(BASE_BACK_OFFICE."comment/add", "smw-admin");
        $view->assign("page_title", "Ajout d'un commentaire");
        $view->assign("page_description", "Page d'ajout d'un commentaire");
	}

    public function viewAction($params){
        $view = new View(BASE_BACK_OFFICE."comment/index", "smw-admin");
        $view->assign("page_title", "Voir les commentaires");
        $view->assign("page_description", "Page listant les commentaires");
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."comment/edit", "smw-admin");
        $view->assign("page_title", "Editer un commentaire");
        $view->assign("page_description", "Page d'édition d'un commentaire");
    }

    public function deleteAction($params){
        $view = new View(BASE_BACK_OFFICE."comment/delete", "smw-admin");
        $view->assign("page_title", "Supprimer un commentaire");
        $view->assign("page_description", "Page de suppression d'un commentaire");
    }
}