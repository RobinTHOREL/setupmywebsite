<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>

    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 title">
                <h2>Envoyer un média</h2>
            </div>
            <div class="row"> <!-- exemple - ligne 2 -->
                <div class="col-7">
                    <input type="text" class="form-group col-4 col-offset-1" placeholder="Nom du média">
                </div> <!-- exemple - ligne 2 -->
                <div class="col-10 col-offset-1">
                    <div id="dropfile">
                        <div id="dropper" class="col-8 col-offset-2" class="col-1">
                            <button class="fa fa-cloud-upload logo-upload" aria-hidden="hide"></button>
                            <p>Glissez un média dans cette zone pour l'uploader</p>
                            <p>Formats acceptés : (png, ..,..,..)</p>
                        </div>
                    </div>

                    <button class="fa fa-cloud-upload logo-upload" aria-hidden="true"></button>
                </div>
            </div>
        </div>
    </div>

<?php
include(dirname(__DIR__).'/footer.php');