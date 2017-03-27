<?php
class LoginController {
	public function indexAction($params){
        $login = "admin";
        $password = "admin";
        $error = "";

        if(!empty($_POST)) {
            if( !empty($_POST['login']) && !empty($_POST['password']) ) {
                if($_POST['login'] !== $login || $_POST['password'] !== $password ) {
                    $error = "Les identifiants n'existe pas.";
                } else {
                    session_start();
                    $_SESSION['login'] = $login;
                    header('Location: dashboard');
                    exit();
                }
            } else {
                $error = "Veuillez entrer des identifiants valide.";
            }
        }
        require VIEWS_PATH."login.view.php";
	}
}