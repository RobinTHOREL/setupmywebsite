<div class="row">
    <div class="col-12 title">
        <header>
            <?php
            if(isset($_SESSION["error_form"])){
                foreach ($_SESSION["error_form"] as $error) {
                    echo "<li>".$error;
                }
                unset($_SESSION["error_form"]);
            }
            ?>
        </header>
    </div>
    <div class="col-12">

        <div class="logo">
            <i class="fa fa-cog"></i>
        </div>
    </div>
    <div class="col-12">
        <h1>Création du compte Administrateur</h1>
    </div>
    <div class="row">
        <div class="col-6 col-offset-3">
            <form action="" method="POST">
                        <label>Login<input type="text" class="form-group" name="login" placeholder="Login" required="required" maxlength="64"></label>
                        <label>Mot de passe<input type="password" class="form-group" name="password" placeholder="Mot de passe" required="required" maxlength="64"></label>
                        <label>Confirmation du mot de passe<input type="password" class="form-group" name="passwordConfirm" placeholder="Confirmation du mot de passe" required="required" maxlength="64"></label>
                        <label>Nom<input type="text" class="form-group" name="lastname" placeholder="Nom" maxlength="120"></label>
                        <label>Prénom<input type="text" class="form-group" name="firstname" placeholder="Prénom" maxlength="120"></label>
                        <label>Email<input type="email" class="form-group" name="email" placeholder="setup@my.website" required="required" maxlength="320"></label>
                       <label>Titre du site<input type="text" class="form-group" name="main_title" placeholder="Titre de mon site" required="required" maxlength="320"></label>

                <div class="col-12">
                    <input type="submit" value="Envoyer">
                </div>

            </form>
        </div>
    </div>
</div>
