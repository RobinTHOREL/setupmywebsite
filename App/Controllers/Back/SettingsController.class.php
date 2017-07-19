<?php
class SettingsController{
    public function indexAction($params){
        $view = new View(BASE_BACK_OFFICE."settings/index", "smw-admin");
        $view->assign("page_title", "Voir les réglages");
        $view->assign("page_description", "Page listant les réglages");
    }
    
    public function mailerAction($params){
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['host']) && isset($_POST['port']) && isset($_POST['smtp-secure'])
            && isset($_POST['smtp-username']) && isset($_POST['smtp-password']) && isset($_POST['from-email']) && isset($_POST['from-username'])) {
            $optionHost = new Options();
            $optionHost->setOption("MAIL_HOST");
            $optionHost->setValue($_POST['host']);
            $optionHost->Save();
            
            $optionPort = new Options();
            $optionPort->setOption("MAIL_PORT");
            $optionPort->setValue($_POST['port']);
            $optionPort->Save();
            
            $optionSecure = new Options();
            $optionSecure->setOption("MAIL_SMTP_SECURE");
            $optionSecure->setValue($_POST['smtp-secure']);
            $optionSecure->Save();
            
            $optionSmtpUsername = new Options();
            $optionSmtpUsername->setOption("MAIL_SMTP_USERNAME");
            $optionSmtpUsername->setValue($_POST['smtp-username']);
            $optionSmtpUsername->Save();
            
            $optionSmtpPassword = new Options();
            $optionSmtpPassword->setOption("MAIL_SMTP_PASSWORD");
            $optionSmtpPassword->setValue($_POST['smtp-password']);
            $optionSmtpPassword->Save();
            
            $optionFromEmail = new Options();
            $optionFromEmail->setOption("MAIL_FROM_EMAIL");
            $optionFromEmail->setValue($_POST['from-email']);
            $optionFromEmail->Save();
            
            $optionFromUsername = new Options();
            $optionFromUsername->setOption("MAIL_FROM_USERNAME");
            $optionFromUsername->setValue($_POST['from-username']);
            $optionFromUsername->Save();
        }
        $view = new View(BASE_BACK_OFFICE."settings/mailer", "smw-admin");
        $view->assign("page_title", "Réglage pour l'envoie des emails");
        $view->assign("page_description", "Page listant les réglages pour l'envoie des emails");
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."settings/edit", "smw-admin");
        $view->assign("page_title", "Editer les réglages");
        $view->assign("page_description", "Page d'édition des réglages");
    }
}