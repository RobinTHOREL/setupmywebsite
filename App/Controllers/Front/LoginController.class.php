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
                        header('Location: smw-admin/dashboard');
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
            $mail->Username = "Setup-My.Website";
            // Password to use for SMTP authentication
            $mail->Password = "SMW";
            // Set who the message is to be sent from
            $mail->setFrom('From@email.em', 'SMW');
            // Set an alternative reply-to address
            //$mail->addReplyTo('replyto@example.com', 'First Last');
            // Set who the message is to be sent to
            $mail->addAddress('To@email.em');
            // Set the subject line
            $mail->Subject = 'PHPMailer GMail SMTP test';
            // Read an HTML message body from an external file, convert referenced images to embedded,
            // convert HTML into a basic plain-text alternative body
            $mail->msgHTML("Hello");
            // Replace the plain text body with one created manually
            $mail->AltBody = 'This is a plain-text message body';
            // Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');
            // send the message, check for errors
            if (! $mail->send()) {
                $message = "Un erreur s'est produite lors de l'envoyé. Veuillez contacter les administrateurs." . $mail->ErrorInfo;
            } else {
                $message = "Un e-mail vous a été envoyé.";
            }
            $view->assign("message", $message);
        }
    }
}