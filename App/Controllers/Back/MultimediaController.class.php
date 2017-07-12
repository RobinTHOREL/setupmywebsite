<?php
class MultimediaController{
	public function addAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/add", "smw-admin");
        $view->assign("page_title", "Ajouter un contenu multimedia");
        $view->assign("page_description", "Page d'ajout de contenu multimedia");
	}

    public function viewAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/index", "smw-admin");
        $view->assign("page_title", "Voir les contenus multimedia");
        $view->assign("page_description", "Page listant les contenus multimedia");

        // Mettre le bon PATH si dessous pour récupérer les fichiers contenu dans le dossier App/Public/upload
        $dir    = 'C:\wamp64\www\setupmywebsite\Public\upload';
        $files1 = scandir($dir);

        echo"<center><pre>";
        print_r($files1);
        echo"</pre>";
        echo "</center>";
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/edit", "smw-admin");
        $view->assign("page_title", "Editer un contenu multimedia");
        $view->assign("page_description", "Page d'édition d'un contenu multimedia");
    }

    public function deleteAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/delete", "smw-admin");
        $view->assign("page_title", "Supprimer un contenu multimedia");
        $view->assign("page_description", "Page de suppression d'un contenu multimedia");
    }
}