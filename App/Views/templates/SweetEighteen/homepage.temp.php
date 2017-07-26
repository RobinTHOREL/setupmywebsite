<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title ?></title>
    <meta name="description" content="<?php echo $page_description ?>">
    <link rel="stylesheet" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/css/style-front.css">
    <link rel="stylesheet" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/css/style-front2.css">
</head>
<body>
<header></header>
<section>

    <!--Vue front-->
    <!--<h1>Setup-My.Website</h1><br>-->

    <!-- Page Contents -->
    <div class="pusher">
        <div class="ui inverted vertical masthead center aligned ">

            <div class="ui container">
                <div class="ui large secondary  pointing menu ">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <!--                            Insert Menu from Page titles. If is empty, show HomePage as default-->
                    <?php $listMenu = Helpers::get_menu();
                    $first = true;
                    $isUrl = false;
                    echo "<a class=\"active item\" href='". ABSOLUTE_PATH_FRONT . "'>Accueil</a>";
                    if ($listMenu != 0)
                    {
                        foreach ($listMenu as $menu)
                        {

                            echo ($first)?"<a class=\"active item\" href='".ABSOLUTE_PATH_FRONT .
                                "page/view/".$menu["id"]."'>":"<a class=\"item\" 
                                href='".ABSOLUTE_PATH_FRONT . "page/view/".$menu["id"]."'>";
                            $first = false;
                            echo $menu["title"]."</a>";
                        }
                    }

                    ?>
                    <div class="right item">
                        <?php
                        if(Helpers::is_logged())
                        {
                            echo "<a class=\"ui  button\" href='". ABSOLUTE_PATH_BACK . "'>Back</a>";
                        }
                        else{
                            echo " <a class=\"ui  button\" href=\"login\">Log in</a>";
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="ui inverted vertical center aligned segment text masthead">
                <h1 class="ui inverted header">
                    <?php echo (!empty(MAIN_TITLE))?MAIN_TITLE:"Votre titre ici"; ?>
                </h1>
                <h2> <?php echo (!empty($page_description))?$page_description:"Créer le site dont vous 
                avez toujours rêvé."; ?></h2>
                <div class="ui huge primary button">Commençons</div>
            </div>


            <?php include $this->view; ?>
</section>
<footer>
    <div>
        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div class="ui stackable inverted divided equal height stackable grid">
                    <div class="three wide column">
                        <h4 class="ui inverted header">About</h4>
                        Edit your footer
                    </div>
                </div>

                <div class="seven wide column">
                    <h4 class="ui inverted header">Setup my website</h4>
                    <p>projet annuel ESGI IW .</p>
                </div>
            </div>
        </div>
    </div>

</footer>
<script src="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/js/index_front.js"></script>
</body>
</html>