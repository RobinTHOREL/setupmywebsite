<?php
class MultimediaController{
	public function addAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."medias/add.view.php";
	}

    public function viewAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."medias/index.view.php";
    }

    public function editAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."medias/edit.view.php";
    }

    public function deleteAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."medias/delete.view.php";
    }
}