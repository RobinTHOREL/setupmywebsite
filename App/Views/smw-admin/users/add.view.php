
    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 col-offset-1 title">
                <h2>Ajouter un utilisateur</h2>
            </div>
            <div class="row"> <!-- exemple - ligne 2 -->
                <div class="col-6 col-offset-3">
                <?php 
                    // Liste les messages d'erreurs ou de réussite
                    echo '<ul>';
                    if(isset($messages) && is_array($messages) ) { 
                        foreach($messages as $message)
                            echo '<li>'.$message.'</li>';
                        } 
                    echo '</ul>';
                ?>
                    <form action="" method="POST">
                        <label>Login<input type="text" class="form-group" name="login" placeholder="Login" required="required"></label>
                        <label>Mot de passe<input type="password" class="form-group" name="password" placeholder="Mot de passe" required="required"></label>
                        <label>Confirmation du mot de passe<input type="password" class="form-group" name="passwordConfirm" placeholder="Confirmation du mot de passe" required="required"></label>
                        <label>Nom<input type="text" class="form-group" name="lastname" placeholder="Nom"></label>
                        <label>Prénom<input type="text" class="form-group" name="firstname" placeholder="Prénom"></label>
                        <label>Email<input type="email" class="form-group" name="email" placeholder="exemple@exemple.com" required="required"></label>
                        <!-- envoyer un mail a l'utilisateur pour qu'il set son password ??? -->
                        <label>Role<select name="permission" id="role" class="form-group" required="required">
                            <option>Membre</option>
                        </select></label>
                        <div class="col-8 col-offset-2" style="text-align: center">
                            <input type="checkbox" id="notif" name="cb" value="" class="form-group">
                            <label for="notif">Notifier le nouveau membre par mail !</label><br>
                        </div>
                        <?php $token = Helpers::generer_token('useradd');?>
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <input type="submit" class="">
                    </form>
                </div> <!-- exemple - ligne 2 -->
            </div>
        </div>
    </div>