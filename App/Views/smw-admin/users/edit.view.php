<div class="container">
    <div class="row"> <!-- exemple - ligne 1 -->
        <div class="col-10 col-offset-1 title">
            <h2>Edition de</h2>
        </div>
        <div class="row"> <!-- exemple - ligne 2 -->
            <div class="col-6 col-offset-3">
                <form action="" method="POST">
                    <?php $token = Helpers::generer_token('useredit');?>
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <input type="text" disabled="disabled" class="form-group" name="login" placeholder="Login">
                    <input type="text" disabled="disabled" class="form-group" name="lastname" placeholder="Nom">
                    <input type="text" disabled="disabled" class="form-group" name="firstname" placeholder="Prénom">
                    <input type="email" class="form-group" name="email" placeholder="exemple@exemple.com">
                    <!-- envoyer un mail a l'utilisateur pour qu'il set son password ??? -->
                    <select name="" id="role" class="form-group">
                        <option>L'utilisateur à oublier son mot de passe ?</option>
                    </select>
                    <div class="col-8 col-offset-2" style="text-align: center">
                        <input type="checkbox" id="renitmdp" name="cb" value="" class="form-group">
                        <label for="renitmdp">Reinitialiser le mot de passe du compte</label><br>
                    </div>
                    <input type="submit" class="">
                </form>
            </div> <!-- exemple - ligne 2 -->
        </div>
    </div>
</div>