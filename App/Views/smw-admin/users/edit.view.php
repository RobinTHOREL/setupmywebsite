
    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 col-offset-1 title">
                <h2>Editer un utilisateur</h2>
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
                        <label>Login
                        <input type="text" 
                        class="form-group" 
                        name="login" 
                        placeholder="Login" 
                        required="required" 
                        disabled="disabled"
                        value="<?php echo $user->getLogin();?>"
                        ></label>
						<label>Nom<input type="text" class="form-group" name="lastname" placeholder="Nom" value="<?php echo $user->getLastName();?>"></label>
                        <label>Prénom<input type="text" class="form-group" name="firstname" placeholder="Prénom"  value="<?php echo $user->getFirstName();?>"></label>
                        <label>Email<input type="email" class="form-group" name="email" placeholder="exemple@exemple.com" required="required"  value="<?php echo $user->getEmail();?>"></label>
                        <!-- envoyer un mail a l'utilisateur pour qu'il set son password ??? -->
                        <label>Role<select name="permission" id="role" class="form-group" required="required">
                            <option>Membre</option>
                        </select></label>

                        <input type="submit" class="">
                    </form>
                </div> <!-- exemple - ligne 2 -->
            </div>
        </div>
    </div>