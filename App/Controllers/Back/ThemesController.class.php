<<<<<<< HEAD
<?php
class ThemesController
{
    public function addAction($params)
    {
        $view = new View(BASE_BACK_OFFICE . "themes/add", "smw-admin");
        $view->assign("page_title", "Ajouter un thème");
        $view->assign("page_description", "Page d'ajout d'un thème");
    }

    public function viewAction($params)
    {
        $view = new View(BASE_BACK_OFFICE . "themes/index", "smw-admin");
        $view->assign("page_title", "Voir les thèmes");
        $view->assign("page_description", "Page listant les thèmes");
    }

    public function selectAction($params)
    {
        $view = new View(BASE_BACK_OFFICE . "themes/index", "smw-admin");
        $view->assign("page_title", "Sélectionner un thème");
        $view->assign("page_description", "Page de sélection des thèmes");
        //For more fluidity select action could be done with JS .
    }

    public function deleteAction($params)
    {
        $view = new View(BASE_BACK_OFFICE . "themes/delete", "smw-admin");
        $view->assign("page_title", "Supprimer un thèmes");
        $view->assign("page_description", "Page de suppression d'un thème");
    }

    public function downloadAction($params)
    {
        $view = new View(BASE_BACK_OFFICE . "themes/index", "smw-admin");
        $view->assign("page_title", "Voir les thèmes");
        $view->assign("page_description", "Page listant les thèmes");
        // Download redirect towards index. DL instructions Here.
    }
}