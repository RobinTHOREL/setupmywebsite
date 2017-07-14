<header>
    <?php
    if(isset($_SESSION["error_form"])){
        foreach ($_SESSION["error_form"] as $error) {
            echo "<li>".$error;
        }
        unset($_SESSION["error_form"]);
    }
    ?>
    <h1>Création du compte Administrateur</h1>
</header>
<section>
    <br><br>
    <form action="" method="post">
        <label>
            Utilisateur :<br>
            <input type="text" name="user" value="" required="required">
        </label>
        <br>
        <label>
            Mot de passe :<br>
            <input type="text" name="password" value="" required="required">
        </label>
        <br>
        <label>
            Email :<br>
            <input type="email" name="email" value="" required="required">
        </label>
        <br><br>
        <input type="submit" value="Envoyer">
    </form>
</section>
<footer>
</footer>
