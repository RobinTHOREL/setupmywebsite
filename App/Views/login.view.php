<h1>Login</h1>
<form action="" method="post">
    <?php
        if( !empty($error) ) {
            echo "<p>" .htmlspecialchars($error). "</p>";
        }
    ?>

        <label for="login">Identifiant : </label>
        <input type="text" name="login" id="login" value="admin"><br>
        <label for="password">Mot de passe : </label>
        <input type="password" name="password" id="password" value="admin">
        <input type="submit" name="submit" value="Login">
    </div>
</form>