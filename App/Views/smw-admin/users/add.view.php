    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 title">
                <h2>Ajouter un utilisateur</h2>
            </div>
            <div class="row"> <!-- exemple - ligne 2 -->
                <div class="col-6 col-offset-3">
                    <form action="" method="POST">
                        <?php $token = Helpers::generer_token('useradd');?>
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <input type="text" class="form-group" name="login" placeholder="Login">
                        <input type="text" class="form-group" name="lastname" placeholder="Nom">
                        <input type="text" class="form-group" name="firstname" placeholder="Prénom">
                        <input type="email" class="form-group" name="email" placeholder="exemple@exemple.com">
                        <!-- envoyer un mail a l'utilisateur pour qu'il set son password ??? -->
                        <select name="" id="role" class="form-group">
                            <option>Membre</option>
                        </select>
                        <div class="col-8 col-offset-2" style="text-align: center">
                            <input type="checkbox" id="notif" name="cb" value="" class="form-group">
                            <label for="notif">Notifier le nouveau membre par mail !</label><br>
                        </div>
                        <input type="submit" class="">
                    </form>
                </div> <!-- exemple - ligne 2 -->
            </div>
        </div>
    </div>