<?php
class ArticlesController{
	public function addAction($params){
        require VIEWS_PATH . "smw-admin/article/add.view.php";
	}

    public function viewAction($params){
        require VIEWS_PATH."smw-admin/article/index.view.php";
    }

    public function editAction($params){
        require VIEWS_PATH."smw-admin/article/edit.view.php";
    }

    public function deleteAction($params){
        require VIEWS_PATH."smw-admin/article/delete.view.php";
    }
}