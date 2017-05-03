<?php
    class Helpers {


        //create token
        //with name
        //with time
        static function generer_token($nom = '')
        {
            //on verifie que la session est initialisée
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = uniqid(rand(), true);
            $_SESSION[$nom.'_token'] = $token;
            $_SESSION[$nom.'_token_time'] = time();
            return $token;
        }


        //time lapse max (300?)
        //referer
        //form name
        static function verifier_token($temps, $referer, $nom = '')
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(isset($_SESSION[$nom.'_token']) && isset($_SESSION[$nom.'_token_time']) && isset($_POST['token']))
                if($_SESSION[$nom.'_token'] == $_POST['token'])
                    if($_SESSION[$nom.'_token_time'] >= (time() - $temps))
                        if($_SERVER['HTTP_REFERER'] == $referer)
                            return true;
            return false;
        }
    }