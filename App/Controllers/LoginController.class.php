<?php
class LoginController {
    public function indexAction($params){
        $error = "";

        if(!empty($_POST)) {
            if( !empty($_POST['login']) && !empty($_POST['password']) ) {
                // On initialise les variables si les données sont bien réupérés
                $login = trim($_POST['login']);
                $password = $_POST['password'];

                $user = new Users();
                $user->Populate(["login" => $login]);

                if(!empty($user->getLogin())) {
                    // On compare le hash au password saisie
                    if(!empty($_POST['password']) && password_verify( $password, $user->getPassword())) {
                        session_start();
                        $_SESSION['login'] = $login;
                        header('Location: dashboard');
                        exit();
                    } else {
                        $error = "Les identifiants n'existent pas.";
                    }
                } else {
                    $error = "Les identifiants n'existent pas.";
                }
            } else {
                $error = "Veuillez entrer des identifiants valides.";
            }
        }
        require VIEWS_PATH."login.view.php";
    }
}