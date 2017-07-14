<?php
/*
 * This class make random password and validate password 
 */
class Password
{
    private $password = "";
    private $numeric = null;
    private $alphabeticLower = null;
    private $alphabeticUpper = null;
    private $special = null;
    private $minChar = null;
    private $maxChar = null;
    private $numericString = "0123456789";
    private $alphabeticLowerString = "abcdefghijklmnopqrstuvwxyz";
    private $alphabeticUpperString = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private $specialString = " !#$%&()*+,-./:;<=>?@[]^_{|}~";

    public function __construct($numeric, $alphabeticLower, $alphabeticUpper, $special, $minChar, $maxChar)
    {
        $this->numeric = $numeric;
        $this->alphabeticLower = $alphabeticLower;
        $this->alphabeticUpper = $alphabeticUpper;
        $this->special = $special;
        $this->minChar = $minChar;
        $this->maxChar = $maxChar;
    }

    public function generatePassword()
    {
        if ($this->numeric !== true && $this->alphabeticLower !== true && $this->alphabeticUpper !== true && $this->special !== true) {
            return null;
        }
        if ($this->minChar < 0 || $this->maxChar < 1) {
            return null;
        }
        
        // Initialise l'aléatoire avec une graine
        list ($usec, $sec) = explode(' ', microtime());
        mt_srand((float) $sec + ((float) $usec * 100000));
        
        // On défini les types de possibilités et génère un caractère de chaque type
        $possibility = "";
        if ($this->numeric === true) {
            $possibility .= $this->numericString;
            $rand = mt_rand(0, strlen($this->numericString) - 1);
            $this->password .= substr($this->numericString, $rand, 1);
        }
        if ($this->alphabeticLower === true) {
            $possibility .= $this->alphabeticLowerString;
            $rand = mt_rand(0, strlen($this->alphabeticLowerString) - 1);
            $this->password .= substr($this->alphabeticLowerString, $rand, 1);
        }
        if ($this->alphabeticUpper === true) {
            $possibility .= $this->alphabeticUpperString;
            $rand = mt_rand(0, strlen($this->alphabeticUpperString) - 1);
            $this->password .= substr($this->alphabeticUpperString, $rand, 1);
        }
        if ($this->special === true) {
            $possibility .= $this->specialString;
            $rand = mt_rand(0, strlen($this->specialString) - 1);
            $this->password .= substr($this->specialString, $rand, 1);
        }
        
        // Puis on génère aléatoirement des caractères selon les possibilités
        $nbChar = mt_rand($this->minChar, $this->maxChar);
        for ($i = strlen($this->password); $i < $nbChar; $i ++) {
            $rand = mt_rand(0, strlen($possibility) - 1);
            $this->password .= substr($possibility, $rand, 1);
        }
        
        $this->password = str_shuffle($this->password);
        return substr($this->password, 0, $this->maxChar);
    }

    /*
     *
     */
    public function validePassword()
    {
        if ($this->numeric !== true && $this->alphabeticLower !== true && $this->alphabeticUpper !== true && $this->special !== true) {
            return null;
        }
        if ($this->minChar < 0 || $this->maxChar < 1) {
            return null;
        }
        
        if (strlen($this->password) < $this->minChar || strlen($this->password) > $this->maxChar) {
            return false;
        }
        
        if ($this->numeric === true) {
            $exist = false;
            for ($j = 0; $j < strlen($this->numericString); $j ++) {
                $needle = substr($this->numericString, $j, 1);
                if (strpos($this->password, $needle) !== false) {
                    $exist = true;
                    break;
                }
            }
            if (! $exist) {
                return false;
            }
        }
        
        if ($this->alphabeticLower === true) {
            $exist = false;
            for ($j = 0; $j < strlen($this->alphabeticLowerString); $j ++) {
                $needle = substr($this->alphabeticLowerString, $j, 1);
                if (strpos($this->password, $needle) !== false) {
                    $exist = true;
                    break;
                }
            }
            if (! $exist) {
                return false;
            }
        }
        
        if ($this->alphabeticUpper === true) {
            $exist = false;
            for ($j = 0; $j < strlen($this->alphabeticUpperString); $j ++) {
                $needle = substr($this->alphabeticUpperString, $j, 1);
                if (strpos($this->password, $needle) !== false) {
                    $exist = true;
                    break;
                }
            }
            if (! $exist) {
                return false;
            }
        }
        
        if ($this->special === true) {
            $exist = false;
            for ($j = 0; $j < strlen($this->specialString); $j ++) {
                $needle = substr($this->specialString, $j, 1);
                if (strpos($this->password, $needle) !== false) {
                    $exist = true;
                    break;
                }
            }
            if (! $exist) {
                return false;
            }
        }
        
        return true;
    }

    /**
     *
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @return the $numeric
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     *
     * @return the $alphabeticLower
     */
    public function getAlphabeticLower()
    {
        return $this->alphabeticLower;
    }

    /**
     *
     * @return the $alphabeticUpper
     */
    public function getAlphabeticUpper()
    {
        return $this->alphabeticUpper;
    }

    /**
     *
     * @return the $special
     */
    public function getspecial()
    {
        return $this->special;
    }

    /**
     *
     * @return the $minChar
     */
    public function getMinChar()
    {
        return $this->minChar;
    }

    /**
     *
     * @return the $maxChar
     */
    public function getMaxChar()
    {
        return $this->maxChar;
    }

    /**
     *
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     *
     * @param field_type $numeric
     */
    public function setNumeric($numeric)
    {
        $this->numeric = $numeric;
    }

    /**
     *
     * @param field_type $alphabeticLower
     */
    public function setAlphabeticLower($alphabeticLower)
    {
        $this->alphabeticLower = $alphabeticLower;
    }

    /**
     *
     * @param field_type $alphabeticUpper
     */
    public function setAlphabeticUpper($alphabeticUpper)
    {
        $this->alphabeticUpper = $alphabeticUpper;
    }

    /**
     *
     * @param field_type $special
     */
    public function setspecial($special)
    {
        $this->special = $special;
    }

    /**
     *
     * @param field_type $minChar
     */
    public function setMinChar($minChar)
    {
        $this->minChar = $minChar;
    }

    /**
     *
     * @param field_type $maxChar
     */
    public function setMaxChar($maxChar)
    {
        $this->maxChar = $maxChar;
    }
}
