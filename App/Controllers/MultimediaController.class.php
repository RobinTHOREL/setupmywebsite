<?php
class MultimediaController{
	public function addAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."medias/add.view.php";
	}

    public function viewAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."medias/index.view.php";

        // Mettre le bon PATH si dessous pour récupérer les fichiers contenu dans le dossier App/Public/upload
        $dir    = '';
        $files1 = scandir($dir);
        $files2 = scandir($dir, 1);

        print_r($files1);
        print_r($files2);
    }

    public function editAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."medias/edit.view.php";
    }

    public function deleteAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."medias/delete.view.php";
    }
}