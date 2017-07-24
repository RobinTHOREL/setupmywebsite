<?php
class SettingsController{
    public function viewAction($params){
        $view = new View(BASE_BACK_OFFICE."settings/index", "smw-admin");
        $view->assign("page_title", "Voir les réglages");
        $view->assign("page_description", "Page listant les réglages");
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."settings/edit", "smw-admin");
        $view->assign("page_title", "Editer les réglages");
        $view->assign("page_description", "Page d'édition des réglages");
    }
    
    public function mailerAction($params){
        $view = new View(BASE_BACK_OFFICE."settings/mailer", "smw-admin");
        $view->assign("page_title", "Editer les réglages pour l'envoie d'email");
        $view->assign("page_description", "Page d'édition des réglages pour l'envoie d'email");
        
        if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
            $messages = [];
            $updateState = false;
            if(isset($_POST['host'])) {
                $optionName = "MAIL_HOST";
                $optionHost = new Options();
                $optionHost->populate(["name"=>$optionName]);
                if($optionHost->getId()=="-1") {
                    $optionHost->setName($optionName);
                }
                $error = false;
                $host = trim($_POST['host']);
                
                /*if(!ctype_alnum ( $host )) {
                    array_push($messages, "L'hôte saisie contient des caractères invalides.");
                    $error = true;
                }*/
                // Taille maximum d'un url
                if(strlen ( $host ) > 2048) {
                    array_push($messages, "L'hôte saisie est trop long.");
                    $error = true;
                }
                
                if( !$error ) {
                    $optionHost->setValue($host);
                    $optionHost->Save();
                    $updateState = true;
                } else {
                    $messages = [];
                }
            }

            if(isset($_POST['port'])) {
                $optionName = "MAIL_PORT";
                $optionPort = new Options();
                $optionPort->populate(["name"=>$optionName]);
                if($optionPort->getId()=="-1") {
                    $optionPort->setName($optionName);
                }
                $error = false;
                $port = $_POST['port'];

                if(!ctype_digit( $port) ) {
                    array_push($messages, "Le port saisie contient des caractères invalides.");
                    $error = true;
                }
                // Taille maximum d'un url
                if($port < 1 || $port > 65535) {
                    array_push($messages, "Le port saisie est invalide");
                    $error = true;
                }
                
                if( !$error ) {
                    $optionPort->setValue($port);
                    $optionPort->Save();
                    $updateState = true;
                } else {
                    $messages = [];
                }
            }
            
            if(isset($_POST['smtp-secure'])) {
                $optionName = "MAIL_SMTP_SECURE";
                $optionSmtpType = new Options();
                $optionSmtpType->populate(["name"=>$optionName]);
                if($optionSmtpType->getId()=="-1") {
                    $optionSmtpType->setName($optionName);
                }
                $error = false;
                $smtpSecureType = $_POST['smtp-secure'];
                
                if( !$error ) {
                    $optionSmtpType->setValue($smtpSecureType);
                    $optionSmtpType->Save();
                    $updateState = true;
                } else {
                    $messages = [];
                }
            }
            
            if(isset($_POST['smtp-username'])) {
                $optionName = "MAIL_SMTP_USERNAME";
                $optionSmtpUsername = new Options();
                $optionSmtpUsername->populate(["name"=>$optionName]);
                if($optionSmtpUsername->getId()=="-1") {
                    $optionSmtpUsername->setName($optionName);
                }
                $error = false;
                $smtpUserName = trim($_POST['smtp-username']);
               
                
                if( !$error ) {
                    $optionSmtpUsername->setValue($smtpUserName);
                    $optionSmtpUsername->Save();
                    $updateState = true;
                } else {
                    $messages = [];
                }
            }
            
            if(isset($_POST['smtp-password']) && !empty($_POST['smtp-password'])) {
                $optionName = "MAIL_SMTP_PASSWORD";
                $optionSmtpPassword = new Options();
                $optionSmtpPassword->populate(["name"=>$optionName]);
                if($optionSmtpPassword->getId()=="-1") {
                    $optionSmtpPassword->setName($optionName);
                }
                $error = false;
                $smtpPassword = $_POST['smtp-password'];
                
                //TODO:Autoriser password vide
                
                if( !$error ) {
                    $optionSmtpPassword->setValue($smtpPassword);
                    $optionSmtpPassword->Save();
                    $updateState = true;
                } else {
                    $messages = [];
                }
            }
            
            if(isset($_POST['from-email'])) {
                $optionName = "MAIL_FROM_EMAIL";
                $optionFromEmail = new Options();
                $optionFromEmail->populate(["name"=>$optionName]);
                if($optionFromEmail->getId()=="-1") {
                    $optionFromEmail->setName($optionName);
                }
                $error = false;
                $fromEmail = trim($_POST['from-email']);
                
                
                if(!filter_var($fromEmail, FILTER_VALIDATE_EMAIL)) {
                    array_push($messages, "Le format de l'email saisie est invalide.");
                }
                
                if(strlen($fromEmail)>320) {
                    array_push($messages, "La longueur de l'email saisie est trop grande.");
                }
                
                if( !$error ) {
                    $optionFromEmail->setValue($fromEmail);
                    $optionFromEmail->Save();
                    $updateState = true;
                } else {
                    $messages = [];
                }
            }
            
            if(isset($_POST['from-username'])) {
                $optionName = "MAIL_FROM_USERNAME";
                $optionFromUserName = new Options();
                $optionFromUserName->populate(["name"=>$optionName]);
                if($optionFromUserName->getId()=="-1") {
                    $optionFromUserName->setName($optionName);
                }
                $error = false;
                $fromUserName = trim($_POST['from-username']);
                
                if( !$error ) {
                    $optionFromUserName->setValue($fromUserName);
                    $optionFromUserName->Save();
                    $updateState = true;
                } else {
                    $messages = [];
                }
            }
        }
    }
}