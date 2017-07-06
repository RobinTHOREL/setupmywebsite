<?php
class PagesController{
    public function addAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."pages/add.view.php";
    }

    public function viewAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."pages/index.view.php";
    }

    public function editAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."pages/edit.view.php";
    }

    public function deleteAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."pages/delete.view.php";
    }
}