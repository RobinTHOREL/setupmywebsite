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
                        header('Location: '.ABSOLUTE_PATH_BACK.'dashboard');
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

        $view = new View("login", "login");
        $view->assign("page_title", "Page de connexion");
        $view->assign("page_description", "Page de connexion");
    }
    
    public function forgetAction($params){
        $view = new View("forget", "login");
        $view->assign("page_title", "Page de connexion");
        $view->assign("page_description", "Page de connexion");
        
        if( !empty($_POST['email']) ) {
            // On recherche l'utilisateur par l'email
            $userEmail = trim($_POST['email']);
            $success = false;
            $user = null;
            if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                $user = new Users();
                $success = $user->populate(["email"=> $userEmail]);
            }
            if(!$success) {
                $message = "Impossible de trouver votre compte. Veuillez vérifier votre saisie.";
            } else {
                // On génère un nouveau mot de passe.
                $password = new Password(true, true, true, true, 12, 16);
                $newPassword = $password->generatePassword();
                $user->setPassword($newPassword);
    
                // On charge les classes de la librairie PHPMailer
                require_once 'Mailer'.DS.'class.phpmailer.php';
                spl_autoload_register(function ($class){
                    if(file_exists("Mailer".DS."class.".$class.".php")){
                        include "Mailer".DS."class.".$class.".php";
                    }                
                });
                   
                // Create a new PHPMailer instance 
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->SMTPDebug = (DEBUG_MODE)?2:0;
                $mail->Debugoutput = 'html';
                $mail->Host = 'smtp.gmail.com';
                // Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                $mail->Port = 587;
                // Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
                $mail->Username = MAIL_SMTP_USERNAME;
                $mail->Password = MAIL_STMP_PASSWORD;
                $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_USERNAME);
                $mail->addAddress($userEmail);
                $mail->Subject = 'Setup My Website - Nouveau mot de passe';
                $mail->msgHTML("Votre nouveau mot de passe est <b>" .$newPassword. "</b>");
                if (! $mail->send()) {
                    $message = "Un erreur s'est produite lors de l'envoyé. Veuillez contacter les administrateurs." ;
                } else {
                    $message = "Un e-mail vous a été envoyé.";
                    $user->Save();
                }
            }
            $view->assign("message", $message);
        }
    }
}
