<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>

<div class="container">
    <div class="row"> <!-- exemple - ligne 1 -->
        <div class="col-10 col-offset-1 bordureRouge" style="border: 2px solid red; padding: 10px;"></div>
    </div>
    <div class="row"> <!-- exemple - ligne 2 -->
        <div class="col-6 col-offset-3 bordureVerte" style="border: 2px solid green; padding: 10px;"></div>
    </div>
    <div class="row"> <!-- exercice - ligne 3 -->
        <div class="col-2 col-offset-2 bordureBleue" style="border: 2px solid blue; padding: 10px;"></div>
    </div>
</div>


<?php
include(dirname(__DIR__).'/footer.php');