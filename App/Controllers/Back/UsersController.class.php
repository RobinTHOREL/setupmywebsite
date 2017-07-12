<?php
class UsersController{
    public function addAction($params)
    {
        if($_POST)
        {

            $referer = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."";
            if(Helpers::verifier_token(
                600,
                $referer ,
                "useradd")
            )
            {

                if( !empty($_POST['login']) &&
                    !empty($_POST['password']) &&
                    !empty($_POST['passwordConfirm']) &&
                    !empty($_POST['email']) &&
                    !empty($_POST['firstname']) &&
                    !empty($_POST['lastname']) &&
                    !empty($_POST['permission'])
                ){
                    // On initialise les variables si les données sont bien réupérés
                    $login = trim($_POST['login']);
                    $password = trim($_POST['password']);
                    $passwordConfirm = trim($_POST['passwordConfirm']);
                    $email = trim($_POST["email"]);
                    $firstname = trim($_POST["firstname"]);
                    $lastname = trim($_POST["lastname"]);
                    $permission = trim($_POST["permission"]);

                    $user = new Users();
                    if( $user->getAllBy($search = [
                        "OR" => ["login"=>$login, "email"=>$email]]) == false)
                    {
                        //On peut enregistrer l'utilisateur, mais son compte ne sera actif que quand il sera enregistré par mail
                        $user->setLogin($login);
                        $user->setPassword($password);
                        $user->setEmail($email);
                        $user->setFirstName($firstname);
                        $user->setLastName($lastname);
                        $user->setStatus(0);
                        $user->setPermission($permission);
                        $user->Save();
                    }
                    else{
                        //list of errors a developper ! ! !
                        echo "on ne peut pas enregistrer l'utilisateur. ";
                    }

                }
            }// close verifier_token
        }//close $_POST
        $view = new View(BASE_BACK_OFFICE."users/add", "smw-admin");
        $view->assign("page_title", "Ajouter des utilisateurs");
        $view->assign("page_description", "Page d'ajout d'un utilisateur");
    }

    public function viewAction($params)
    {
        $view = new View(BASE_BACK_OFFICE."users/index", "smw-admin");
        $view->assign("page_title", "Voir les utilisateurs");
        $view->assign("page_description", "Page listant les utilisateurs");
    }

    public function editAction($params)
    {
        $view = new View(BASE_BACK_OFFICE."users/edit", "smw-admin");
        $view->assign("page_title", "Editer un utilisateur");
        $view->assign("page_description", "Page d'édition d'un utilisateur");
    }

    public function deleteAction($params)
    {
        $view = new View(BASE_BACK_OFFICE."users/delete", "smw-admin");
        $view->assign("page_title", "Supprimer un utilisateur");
        $view->assign("page_description", "Page de suppression d'un utilisateur");
    }
}