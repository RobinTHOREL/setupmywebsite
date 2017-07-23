
    <div class="container">
        <div class="row">
            <div class="col-10 col-offset-1 title">
                <h2>Votre profil</h2>
            </div>
            <div class="col-10 col-offset-1 title">
                <?php 
                // Liste les messages d'erreurs ou de réussite
                echo '<ul>';
                if(isset($messages) && is_array($messages) ) { 
                    foreach($messages as $message) {
                        echo '<li>'.$message.'</li>';
                    }
                } 
                echo '</ul>';
                ?>
            </div>
            <div class="row">
                <div class="col-4 col-offset-1">
                	<div>
               			<h3>Informations du compte</h3>
            		</div>
                    <form action="" method="POST">
                        <label>Login<input type="text" class="form-group" name="login" placeholder="Login" value="<?php echo $user->getLogin(); ?>" disabled maxlength="64"></label>
                        <label>Nom<input type="text" class="form-group" name="lastname" placeholder="Nom" value="<?php echo $user->getLastName(); ?>" maxlength="120"></label>
                        <label>Prénom<input type="text" class="form-group" name="firstname" placeholder="Prénom" value="<?php echo $user->getFirstName(); ?>" maxlength="120"></label>
                        <label>Email<input type="email" class="form-group" name="email" placeholder="exemple@exemple.com"  value="<?php echo $user->getEmail(); ?>" required="required" maxlength="320"></label>
                        <label>Role<select name="permission" id="role" class="form-group" required="required">
                            <option value="<?php echo $user->getPermission(); ?>">Membre</option>
                        </select></label>
                        <input type="submit" class="">
                    </form>
                </div>
                <div class="col-4 col-offset-1">
                    <div>
               			<h3>Réinitialisation du mot de passe</h3>
            		</div>
                    <form action="" method="POST">
                        <label>Ancien mot de passe<input type="password" class="form-group" name="old_password" placeholder="Mot de passe" required="required" maxlength="64"></label>
                        <label>Nouveau mot de passe<input type="password" class="form-group" name="new_password" placeholder="Mot de passe" required="required" maxlength="64"></label>
                        <label>Confirmation du mot de passe<input type="password" class="form-group" name="new_password_confirm" placeholder="Confirmation du mot de passe" required="required" maxlength="64"></label>
                        <input type="submit" value="Réinitialiser">
                    </form>
                </div>
            </div>
        </div>   
    </div>
