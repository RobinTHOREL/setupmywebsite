Erreur 404 : La page demandé n'existe pas.<br>
<?php
    if(DEBUG_MODE && isset($error)) {
        echo $error . "<br>";
    }
?>