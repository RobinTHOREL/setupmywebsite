<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>

    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 title">
                <h2>Ajouter un utilisateur</h2>
            </div>
            <div class="row"> <!-- exemple - ligne 2 -->
                <div class="col-6 col-offset-3">
                    <input type="text" class="form-group" placeholder="Login">
                    <input type="text" class="form-group" placeholder="Nom">
                    <input type="text" class="form-group" placeholder="Prénom">
                    <input type="email" class="form-group" placeholder="exemple@exemple.com">
                    <!-- envoyer un mail a l'utilisateur pour qu'il set son password ??? -->
                    <select name="" id="role" class="form-group">
                        <option class="form-group">Membre</option>
                    </select>
                    <div class="col-8 col-offset-2" style="text-align: center">
                        <input type="checkbox" id="notif" name="cb" value="" class="form-group">
                        <label for="notif">Notification par mail !</label><br>
                    </div>
                    <input type="submit" class="">
                </div> <!-- exemple - ligne 2 -->
            </div>
        </div>
    </div>


<?php
include(dirname(__DIR__).'/footer.php');
?>