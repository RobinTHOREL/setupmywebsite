<div class="row"> <!-- exemple - ligne 1 -->
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
        <p class="smw">SMW-ADMIN</p>
    </div>
    <div class="col-12">
        <h1>Création du compte Admin</h1>
    </div>
    <div class="row"> <!-- exemple - ligne 2 -->
        <div class="col-6 col-offset-3">
            <form action="" method="POST">
                <label for="utilisateur"> Utilisateur :<br>
                    <input type="text" class="form-group" name="user" value="" required="required">
                </label>
                <label for="password"> Password :<br>
                    <input type="text" class="form-group" name="password" value="" required="required">
                </label>
                <label for="email">Email :<br>
                    <input type="text" class="form-group" name="email" value="" required="required">
                </label>
                <div class="col-12">
                    <input type="submit" value="Envoyer">
                </div>

            </form>
        </div> <!-- exemple - ligne 2 -->
    </div>
</div>
