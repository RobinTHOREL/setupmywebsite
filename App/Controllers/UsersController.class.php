<?php
class UsersController{
    public function addAction($params)
    {
        if($_POST)
        {
            if(Helpers::verifier_token(
                300,
                $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ,
                "useradd")
            )
            {
                //CSRF VERIFIED
                //ICI INSERER l'USER
            }
        }
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