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
    <div class="row">
        <div class="col-12">
            <div class="col-6">
                <!--Code for Radio Buttons-->
                <input type="radio" id="rb1" name="rb" value="" checked class="form-group">
                <label for="rb1">Article</label><br>
                <input type="radio" id="rb2" name="rb"value="" class="form-group">
                <label for="rb2">Page</label><br>
                <input type="radio" id="rb3" name="rb" value="" class="form-group">
                <!--  <label for="rb3">United States</label> -->
            </div>
            <div class="col-6">
                <!--Code for Checkbox-->
                <input type="checkbox" id="cb1" name="cb" value="" class="form-group">
                <label for="cb1">Activer les commentaires</label><br>
                <input type="checkbox" id="cb2" name="cb"value="" checked class="form-group">
                <label for="cb2">-----???</label><br>
                <input type="checkbox" id="cb3" name="cb" value="" class="form-group">
                <label for="cb3">Indiqué la date et l'heure de la publication</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <input type="email" class="form-group" placeholder="example@example.com">
        </div>
        <div class="col-2 col-offset-1">
            <input type="number" class="form-group" value="1" min="0">
        </div>
    </div>
</div>


<?php
include(dirname(__DIR__).'/footer.php');