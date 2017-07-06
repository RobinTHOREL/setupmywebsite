<?php
class SettingsController{
    public function viewAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."settings/index.view.php";
    }

    public function editAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."settings/edit.view.php";
    }
}