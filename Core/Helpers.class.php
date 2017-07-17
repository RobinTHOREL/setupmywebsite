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

        static function logout()
        {
            session_destroy();
        }

        static function get_menu()
        {
                $menu = new Pages();

                $menus =$menu->getAllBy($search = [[]]);
                return $menus;
        }

    }