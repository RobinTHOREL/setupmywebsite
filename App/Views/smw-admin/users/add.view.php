<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>
<div class="container col-12">
    <div class="col-6"><h1>Ajout d'un utilisateur : test csrf / testmail</h1></div>

</div>
<div class="container col-5">
    <form action="" method="POST">
        <?php $token = Helpers::generer_token('useradd');?>
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="text" name="lastname" placeholder="Nom">
        <input type="text" name="firstname" placeholder="Prénom">
        <input type="email" name="email" placeholder="Email">
        <br> <br>
        <input type="text" name="login" placeholder="Identifiant">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="passwordConfirm" placeholder="Confirmation">
        <select name="permission">
            <option value = "1">Abonné</option>
            <option value = "2">Editeur</option>
            <option value = "3">Administrateur</option>
        </select>
        <br> <br>
        <input type="submit">
    </form>

</div>


<?php
include(dirname(__DIR__).'/footer.php');
?>