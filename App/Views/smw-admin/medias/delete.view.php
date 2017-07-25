    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-12 title">
                <h2>Supprimer un media</h2>
            </div>
        </div>

        <?php // Cas ou l'article existe et la suppression n'est pas confirmé
            if(isset($mediaExist) && $mediaExist===true && !isset($delete)) {
                $text = "<div class=\"row\">
                    <form action=\"\" method=\"post\">
                        <div class=\"col-12\">
                            Etes-vous sur de vouloir supprimer le média ?
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
            else if (isset($mediaExist) && $mediaExist && isset($delete) && $delete) {
                $text = "<div class=\"row\">
                    <div class=\"col-12\">
                        Le media a été supprimé.
                   </div>
                </div>";
                echo $text;
            }
            // Cas ou l'article n'existe pas
            else {
                $text = "<div class=\"row\">
                                <div class=\"col-12\">
                                    Le media est introuvable ou ne peut pas être supprimé.
                               </div>
                            </div>";
                echo $text;
            }
        ?>
    </div>
