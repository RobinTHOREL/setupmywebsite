<div class="row">
    <div class="col-12">
        <?php
        if(isset($_SESSION["error_form"])){
            foreach ($_SESSION["error_form"] as $error) {
                echo "<li>".$error;
            }
            unset($_SESSION["error_form"]);
        }
        ?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="logo">
            <i class="fa fa-cog"></i>
        </div>
        <p class="smw">SMW-ADMIN</p>
    </div>
</div>
<div class="row">
        <div class="col-12">
            <h1>Terminer l'installation</h1>
        </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="" method="post">
            <input type="hidden" name="start" value="true">
            <input type="submit" value="Commencer">
        </form>
    </div>
</div>

