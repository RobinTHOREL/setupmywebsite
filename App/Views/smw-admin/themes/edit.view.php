<?php
/**
 * Created by PhpStorm.
 * User: younesdiouri
 * Date: 20/07/2017
 * Time: 10:51
 */
?>

<div class="col-offset-5 col-3">
    Modification du thème : <?php echo "<h1>".$theme_actuel."</h1>"; ?>
    <form action="" method="POST">
        <input type="text" name="titre_main" value="titre de la frontpage"><br>
        <input name="footer" value="0" type="hidden">
        Footer : <input type="checkbox" name="footer" value="1"><br>
        <input name="sidebar" value="0" type="hidden">
        Sidebar : <input type="checkbox" name="sidebar" value="1"><br>
        <input type="submit" value="Sauvegarder">
    </form>
</div>
<?php
    if(!empty($error))
    {
        echo '<div class="col-offset-5 col-3" >'.$error.'</div>';
    }
?>

