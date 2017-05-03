<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>
<div class="container col-12">
    <div class="col-6"><h1>Ajout d'un utilisateur : test csrf / testmail</h1></div>

</div>
<div class="container col-5">
    <form action="" method="POST">
        <?php $token = Helpers::generer_token('user add');?>
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="text" name="lastname" placeholder="Nom">
        <input type="text" name="firstname" placeholder="Prénom">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="login" placeholder="Identifiant">
        <input type="password" name="password" placeholder="Mot de passe">
        <select name="permission">
            <option>Editeur</option>
            <option>Abonné</option>
            <option>Administrateur</option>
        </select>
        <input type="submit" value="Ajouter">
    </form>

</div>
    <div class="container col-5">
        <form>
            <input type="text" name="object" placeholder="Objet"><br><br>
            <textarea name="corps"></textarea><br><br>
            <input type="email" name="email" placeholder="Email">
        </form>
    </div>


<?php
include(dirname(__DIR__).'/footer.php');
?>