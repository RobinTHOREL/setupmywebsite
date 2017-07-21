<?php
/**
 * Created by PhpStorm.
 * User: younesdiouri
 * Date: 20/07/2017
 * Time: 10:51
 */
?>
<div class="row">
    <div class="col-12">
        <h1>Modification du thème : <?php echo $theme_actuel ; ?> </h1>
    </div>
</div>
<div class="row"> <!-- exemple - ligne 2 -->
    <div class="col-6 col-offset-3">
        <form action="" method="POST">
                <input type="text" class="form-group" name="titre_main" value="titre de la front page">

            <input type="hidden" name="footer" value="0" class="form-group">
            <label for="footer">Footer</label> <input type="checkbox" name="footer" value="1"><br>

            <input type="hidden" name="footer" value="0" class="form-group">
            <label for="sidebar">Sidebar</label><input type="checkbox" name="sidebar" value="1">

            <div class="col-12">
                <input type="submit" value="Sauvegarder">
            </div>
        </form>
    </div>
    <?php
    if(!empty($error))
    {
        echo '<div class="col-offset-12" >'.$error.'</div>';
    }
    ?>
</div>

