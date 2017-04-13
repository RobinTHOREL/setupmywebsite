<?php
class ArticlesController{
	public function addAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."article/add.view.php";
	}

    public function viewAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."article/index.view.php";
    }

    public function editAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."article/edit.view.php";
    }

    public function deleteAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."article/delete.view.php";
    }
}