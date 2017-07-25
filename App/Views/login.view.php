
<section>
    <div class="col-12">
        <div class="logo col-12">
            <i class="fa fa-cog"></i>
        </div>
    </div>
        <div class="back_glob">
            <div class="back_header">
                <h1>LOGIN</h1>
            </div>
            <form action="" method="post">
                <div class="trois-colonnes">
                    <div class="colonne2">
                        <input type="text" name="login" value="" placeholder="login" class="form-group">
                    </div>

                    <div class="colonne2">
                         <input type="password" placeholder="mot de passe" name="password" value="" class="form-group">
                    </div>

                    <div class="colonne2">
                        <input type="submit" name="submit" value="Connexion" class="form-group">
                    </div>
                </div>
                <a href="<?php echo ABSOLUTE_PATH_FRONT."login/forget" ?>">Mot de passe oublié ?</a>
                <?php
                if( !empty($error) ) {
                    echo "<p>" .htmlspecialchars($error). "</p>";
                }
                ?>
            </form>
        </div>
</section>
