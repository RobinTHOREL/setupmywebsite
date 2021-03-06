<!-- Retirer la mise en forme du <a> -->
<div class="left-menu">
    <div class="logo"><a href="<?php echo ABSOLUTE_PATH_BACK . "dashboard";?>"><i class="fa fa-cog"></i></a>
        <p>Setup My Website</p>
    </div>
    <div class="accordion">
        <div class="section">
            <input type="radio" name="accordion-1" id="section-1" />
            <label for="section-1"><i class="fa fa-eye respons_hidden"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "dashboard";?>">Dashboard</a></span></label>
        </div>
        <div class="section">
            <input type="radio" name="accordion-1" id="section-2" value="toggle" <?php (ABSOLUTE_PATH_BACK . "articles/add")? "checked = \"checked\"":"";?>/>
            <label for="section-2"><i class="fa fa-pencil"></i> <span class="respons_hidden">Articles</span></label>
            <div class="content">
                <ul>
                    <li><i class="fa fa-plus"></i><span class="respons_hidden"><a id="art_add" href="<?php echo ABSOLUTE_PATH_BACK . "articles/add";?>">Ajouter</a></span></li>
                    <li><i class="fa fa-bars"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "articles/view";?>">Liste des articles</a></span></li>
                </ul>
            </div>
        </div>
        <div class="section">
            <input type="radio" name="accordion-1" id="section-3" value="toggle"/>
            <label for="section-3"><i class="fa fa-file-o"></i> <span class="respons_hidden">Pages</span></label>
            <div class="content">
                <ul>
                    <li><i class="fa fa-plus"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "pages/add";?>">Ajouter</a></span></li>
                    <li><i class="fa fa-bars"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "pages/view";?>">Toutes les pages</a></span></li>
                </ul>
            </div>
        </div>
        <div class="section">
            <input type="radio" name="accordion-1" id="section-4" value="toggle" />
            <label for="section-4"><i class="fa fa-camera"></i> <span>Bibliothéque</span></label>
            <div class="content">
                <ul>
                    <li><i class="fa fa-plus"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "multimedia/add";?>">Ajouter un média</a></span></li>
                    <li><i class="fa fa-th"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "multimedia/view";?>">Bibliothéque des médias</a></span></li>
                </ul>
            </div>
        </div>
        <div class="section">
            <input type="radio" name="accordion-1" id="section-5" value="toggle"/>
            <label for="section-5"><i class="fa fa-font"></i> <span class="respons_hidden">Apparence</span></label>
            <div class="content">
                <ul>
                    <li><i class="fa fa-desktop"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "themes/view";?>">Thémes</a></span></li>
                    <li><i class="fa fa-eyedropper"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "themes/view";?>">Personnaliser</a></span></li>
                    <li><i class="fa fa-level-up"></i><span class="respons_hidden">Widget</span></li>
                </ul>
            </div>
        </div>
        <div class="section">
            <input type="radio" name="accordion-1" id="section-6" value="toggle"/>
            <label for="section-6"><i class="fa fa-user-circle"></i> <span class="respons_hidden">Utilisateurs</span></label>
            <div class="content">
                <ul>
                    <li><i class="fa fa-user-plus"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "users/add";?>">Ajouter</a></span></li>
                    <li><i class="fa fa-users"></i><span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "users/view";?>">Tous les utilisateurs</a></span></li>
                    <li><i class="fa fa-user-o"></i><span class="respons_hidden">Votre profil</span></li>
                </ul>
            </div>
        </div>
        <div class="section">
            <input type="radio" name="accordion-1" id="section-7" value="toggle"/>
            <label for="section-7"><i class="fa fa-wrench"></i> <span class="respons_hidden">Outils</a></span></label>
            <!--<div class="content">
            </div>-->
        </div>
        <div class="section">
            <input type="radio" name="accordion-1" id="section-8" value="toggle"/>
            <label for="section-8"><i class="fa fa-gears"></i> <span class="respons_hidden"><a href="<?php echo ABSOLUTE_PATH_BACK . "settings/view";?>">Réglages</a></span></label>
            <!--  <div class="content">
              </div> -->
        </div>
        <div class="section">
            <label for="section-8"><i class="fa fa-sign-out"></i> <span class="respons_hidden"><a onclick="<?php Helpers::logout(); ?>" href="<?php echo ABSOLUTE_PATH_FRONT . "index";?>">Logout</a></span></label>

        </div>
    </div>
</div>