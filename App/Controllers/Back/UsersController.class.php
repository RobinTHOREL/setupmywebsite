<?php
class UsersController{
    public function addAction($params)
    {
        $view = new View(BASE_BACK_OFFICE."users/add", "smw-admin");
        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) && !empty($_POST['email']) && !empty($_POST['firstname'])
            && !empty($_POST['lastname']) && !empty($_POST['permission']))
        {

            /* 
                // Vérification du token
                $referer = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."";
                if(Helpers::verifier_token(
                    600,
                    $referer ,
                    "useradd")
                )
                {
                } 
            */
            
            // On initialise les variables si les données sont bien réupérés
            $user = new Users();
            $messages = array();
            $login = trim($_POST['login']);
            $password = trim($_POST['password']);
            $passwordConfirm = trim($_POST['passwordConfirm']);
            $email = trim($_POST["email"]);
            $firstname = trim($_POST["firstname"]);
            $lastname = trim($_POST["lastname"]);
            $permission = trim($_POST["permission"]);
            
            if(strlen($login)<4 || strlen($login)>64) {
                array_push($messages, "Le login saisie est incorrect. Il doit faire en 4 et 64 caractères.");
            }
            
            $validePassword = new Password(true, true, true, true, 4, 64);
            $validePassword->setPassword($password);
            if(!$validePassword->validePassword($password)) {
                array_push($messages, "Le mot de passe saisie ne respecte pas les critères de sécurités.");
            }
            
            if(strcmp($password, $passwordConfirm) != 0) {
                array_push($messages, "Les mots de passe saisies ne correspondent pas.");
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($messages, "Le format de l'email saisie est invalide.");
            }
            
            if(strlen($firstname)>120) {
                array_push($messages, "La longueur du prénom saisie est trop grande.");
            }
            
            if(strlen($lastname)>120) {
                array_push($messages, "La longueur du nom saisie est trop grande.");
            }
            
            if(strlen($email)>320) {
                array_push($messages, "La longueur de l'email saisie est trop grande.");
            }
            
            $checkExist = $user->getAllBy($search = ["OR" => ["login"=>$login, "email"=>$email]]);
            if($checkExist == true) {
                array_push($messages, "L'utilisateur existe déjà.");
            }
            
            if( count($messages)<=0 )
            {
                //On peut enregistrer l'utilisateur, mais son compte ne sera actif que quand il sera enregistré par mail
                $user->setLogin($login);
                $user->setPassword($password);
                $user->setEmail($email);
                $user->setFirstName($firstname);
                $user->setLastName($lastname);
                //$user->setStatus(0);
                //$user->setPermission($permission);
                $user->setActivationKey("");
                $user->Save();
                array_push($messages, "L'utilisateur a été créé.");
            }
            
            $view->assign("messages", $messages);
        }
        $view->assign("page_title", "Ajouter des utilisateurs");
        $view->assign("page_description", "Page d'ajout d'un utilisateur");
    }

    public function viewAction($params)
    {
        $user = new Users();
        $results = $user->getAllBy([[]], 20, 0);

        $view = new View(BASE_BACK_OFFICE."users/index", "smw-admin");
        $view->assign("results", $results);
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