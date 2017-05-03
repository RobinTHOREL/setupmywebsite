<?php
class LoginController {
    public function indexAction($params){
        $error = "";

        if(!empty($_POST)) {
            if( !empty($_POST['login']) && !empty($_POST['password']) ) {
                // On initialise les variables si les données sont bien réupérés
                $login = trim($_POST['login']);
                $password = $_POST['password'];

                // On se connecte à la base pour récupéré le login du user et son mot de passe hashé
                $db=null;
                try {
                    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT, DB_USER, DB_PWD);
                } catch(Exception $e) {
                    die("Erreur SQL : " .$e->getMessage());
                }

                // On effectue une requête pour vérifié si le login existe et récupéré le mot de passe hashé
                $req = "SELECT password FROM users WHERE login='".$login."'";
                $query = $db->prepare($req );
                $query->execute();
                $results = $query->fetch(PDO::FETCH_ASSOC);

                /*$user = new Users();
                $user = $user->Populate(["login" => $login]);
                print_r($user);*/

                if(!empty($results)) {
                    // On compare le hash au password saisie
                    if(!empty($_POST['password']) && password_verify( $password, $results['password'])) {
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