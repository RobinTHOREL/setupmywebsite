<?php
class UsersController{
    public function addAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."users/add.view.php";
    }

    public function viewAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."users/index.view.php";
    }

    public function editAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."users/edit.view.php";
    }

    public function deleteAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."users/delete.view.php";
    }

}