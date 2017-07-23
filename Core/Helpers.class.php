<?php
    class Helpers
    {


        /**
         * CSRF Validation Generate Token
         *
         * PHP version 5.6
         *
         * @nom Name for the uniq session
         */
        static function generer_token($nom = '')
        {
            //on verifie que la session est initialisée
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = uniqid(rand(), true);
            $_SESSION[$nom . '_token'] = $token;
            $_SESSION[$nom . '_token_time'] = time();
            return $token;
        }


        /**
         * CSRF Validation Verify Token
         *
         * PHP version 5.6
         *
         * @temps Time for the living token
         * @referer The referer
         * @nom Name for the uniq session
         */
        static function verifier_token($temps, $referer, $nom = '')
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION[$nom . '_token']) && isset($_SESSION[$nom . '_token_time']) && isset($_POST['token']))
                if ($_SESSION[$nom . '_token'] == $_POST['token'])
                    if ($_SESSION[$nom . '_token_time'] >= (time() - $temps))
                        if ($_SERVER['HTTP_REFERER'] == $referer)
                            return true;
            return false;
        }

        /**
         * Simple Logout function
         * PHP version 5.6
         *
         * destroying current session.
         */
//        NOT WORKING. (younes)
//        static function logout()
//        {
//            session_destroy();
//        }

        /**
         * get_menu() function
         * PHP version 5.6
         *
         * populating var $menu with Page model vars from DB.
         * @return array|bool
         */
        static function get_menu()
        {
            // Update : return only 10 first pages on menu and if is_published is enable
            $menu = new Pages();
            $menus = $menu->getAllBy( ["AND" => ["is_published"=>"1"]] , 10);
            return $menus;
        }

        /**
         * is_logged function
         * PHP version 5.6
         *
         * check is the user is authentificated.
         * @return bool
         */
        static function is_logged()
        {
            if(!empty($_SESSION['login'])) {
                return true;
            }
            else {
                return false;
            }
        }
    }