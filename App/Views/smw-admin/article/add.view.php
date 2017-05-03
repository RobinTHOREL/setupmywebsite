<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>

<div class="container">
    <div class="row"> <!-- exemple - ligne 1 -->
        <div class="col-10 title">
            Ajouter un article
        </div>
    </div>
    <div class="row"> <!-- exemple - ligne 2 -->
        <div class="col-7">
            <input type="text" class="form-group" placeholder="Titre de l'article">
        </div> <!-- exemple - ligne 2 -->
        <div class="col-4 col-offset-1">
            <textarea type="text" class="form-group" placeholder="Titre de l'article"> </textarea>
        </div>
    </div>
    <div class="row"> <!-- exercice - ligne 3 -->
        <div class="col-3">
            <select name="salut" id="salut" class="form-group">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-1 col-offset-1">
            <input type="submit">
        </div>
        <div class="col-1 col-offset-1">
            <input type="reset">
        </div>
    </div>
</div>


<?php
include(dirname(__DIR__).'/footer.php');