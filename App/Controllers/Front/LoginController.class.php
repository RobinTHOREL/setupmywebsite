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
                        header('Location: ./smw-admin/dashboard');
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
            $user = new Users();
            $success=$user->populate(["email"=> $userEmail]);
            if(!$success) {
                $message = "Impossible de trouver votre compte. Veuillez vérifier votre saisie.";
            } else {
                // On génère un nouveau mot de passe.
                // On défini les caractères à y trouver
                $str="0123456789";
                $str.="abcdefghijklmnopqrstuvwxyz";
                $str.="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                // Transforme la chaine en tableau pour shuffle()
                $strSplit=str_split($str, 1);
                // Mélange les caractères aléatoirement
                shuffle($strSplit);
                // Recompose en chaine
                $strShuffle=implode($strSplit);
                $newPassword=substr($strShuffle, 0, 12);
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
                // Tell PHPMailer to use SMTP
                $mail->isSMTP();
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                // Enable SMTP debugging
                // 0 = off (for production use)
                // 1 = client messages
                // 2 = client and server messages
                $mail->SMTPDebug = (DEBUG_MODE)?2:0;
                // Ask for HTML-friendly debug output
                $mail->Debugoutput = 'html';
                // Set the hostname of the mail server
                $mail->Host = 'smtp.gmail.com';
                // use
                // $mail->Host = gethostbyname('smtp.gmail.com');
                // if your network does not support SMTP over IPv6
                // Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                $mail->Port = 465;
                // Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'ssl';
                // Whether to use SMTP authentication
                $mail->SMTPAuth = true;
                // Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = MAIL_SMTP_USERNAME;
                // Password to use for SMTP authentication
                $mail->Password = MAIL_STMP_PASSWORD."11";
                // Set who the message is to be sent from
                $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_USERNAME);
                // Set an alternative reply-to address
                //$mail->addReplyTo('replyto@example.com', 'First Last');
                // Set who the message is to be sent to
                $mail->addAddress($userEmail);
                // Set the subject line
                $mail->Subject = 'Setup My Website - Nouveau mot de passe';
                // Read an HTML message body from an external file, convert referenced images to embedded,
                // convert HTML into a basic plain-text alternative body
                $mail->msgHTML("Votre nouveau mot de passe est <b>" .$newPassword. "</b>");
                // Replace the plain text body with one created manually
                //$mail->AltBody = '';
                // Attach an image file
                //$mail->addAttachment('images/phpmailer_mini.png');
                // send the message, check for errors
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
