<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Configuration 3</title>
    <meta name="description" content="Page d'installation de Setup-My Website, étape 3">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
    <?php
    if(isset($_SESSION["error_form"])){
        foreach ($_SESSION["error_form"] as $error) {
            echo "<li>".$error;
        }
        unset($_SESSION["error_form"]);
    }
    ?>
    <h1>Finalisation de l'installation</h1>
</header>
<section>
    <br><br>
    <form action="" method="post">
        <input type="hidden" name="start" value="true">
        <br><br>
        <input type="submit" value="Commencer">
    </form>
</section>
<footer>
</footer>
</body>
</html>