<?php
class CommentsController{
	public function createAction($params){
        require VIEWS_PATH."smw-admin/comment/add.view.php";
	}

    public function viewAction($params){
        require VIEWS_PATH."smw-admin/comment/index.view.php";
    }

    public function editAction($params){
        require VIEWS_PATH."smw-admin/edit.view.php";
    }

    public function deleteAction($params){
        require VIEWS_PATH."smw-admin/delete.view.php";
    }
}