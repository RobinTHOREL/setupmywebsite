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