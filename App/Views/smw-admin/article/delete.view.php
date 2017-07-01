<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>
    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-12 title">
                <h2>Supprimer un article</h2>
            </div>
        </div>

        <?php // Cas ou l'article existe et la suppression n'est pas confirmé
            if(isset($postExist) && $postExist===true && !isset($delete)) {
                $text = "<div class=\"row\">
                    <form action=\"\" method=\"post\">
                        <div class=\"col-12\">
                            Etes-vous sur de vouloir supprimer l'article ?
                        </div>
                        <div class=\"col-12\">
                            <input type=\"hidden\" name=\"confirm\" value=\"true\">
                            <input type=\"submit\" class=\"form-group\" value=\"Supprimer\">
                        </div>
                    </form>
                </div>";
                echo $text;
            }
            // Cas ou l'article existe et la suppression est confirmé
            else if (isset($postExist) && $postExist && isset($delete) && $delete) {
                $text = "<div class=\"row\">
                    <div class=\"col-12\">
                        L'article a été supprimé.
                   </div>
                </div>";
                echo $text;
            }
            // Cas ou l'article n'existe pas
            else {
                $text = "<div class=\"row\">
                                <div class=\"col-12\">
                                    L'article est introuvable ou ne peut pas être supprimé.
                               </div>
                            </div>";
                echo $text;
            }
        ?>

<?php
include(dirname(__DIR__).'/footer.php');
?>