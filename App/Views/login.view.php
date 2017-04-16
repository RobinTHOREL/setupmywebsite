<D<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/setupmywebsite/Public/css/grid.css">
    <link rel="stylesheet" href="/setupmywebsite/Public/css/styleLogin.css">
    <meta charset="UTF-8">
    <title>Page de connexion</title>
</head>
    <body>
        <div class="back_glob">
            <div class="back_header">
                <h1>LOGIN</h1>
            </div>
            <form action="" method="post">
                <div class="trois-colonnes">
                    <div class="colonne2">
                        <input type="text" name="login" value="admin" class="form-group">
                    </div>

                    <div class="colonne2">
                         <input type="password" placeholder="password" name="password" value="admin" class="form-group">
                    </div>

                    <div class="colonne2">
                        <input type="submit" name="login" value="Login" class="form-group">
                    </div>
                </div>
                    <a href="#">Forgot password?</a>
                <?php
                if( !empty($error) ) {
                    echo "<p>" .htmlspecialchars($error). "</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>

