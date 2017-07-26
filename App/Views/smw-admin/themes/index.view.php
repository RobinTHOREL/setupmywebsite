<link rel="stylesheet" href="/setupmywebsite/Public/css/style-preview.css">
    <div class="col-offset-5">
        <h1>Thème actuel : <?php if(isset($theme_actuel)) echo $theme_actuel; ?></h1>
        <div class="card card-1"><img style="width: 300px; position : relative" src="<?php echo "/setupmywebsite/App/Views/templates/".CHOSEN_TEMPLATE."/img/preview.png";?>">
            <a href="<?php echo ABSOLUTE_PATH_BACK . "themes/edit";?>"><i class="fa fa-cogs" id="settings-preview" style="position: absolute" aria-hidden="true"></i></a>
    </div>
</div>

