<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $page_title ?></title>
		<meta name="description" content="<?php echo $page_description ?>">
        <link rel="stylesheet" href="/setupmywebsite/Public/css/style_front.css">
	</head>
	<body>
        <header></header>
        <section>

            <!--Vue front-->

            <!-- Page Contents -->
            <div class="pusher">
                <div class="ui inverted vertical masthead center aligned segment">

                    <div class="ui container">
                        <div class="ui large secondary inverted pointing menu">
                            <a class="toc item">
                                <i class="sidebar icon"></i>
                            </a>
<!--                            Insert Menu from Page titles. If is empty, show HomePage as default-->
                            <?php $listMenu = Helpers::get_menu();

                            $first = true;
                            $isUrl = false;

                            if ($listMenu != 0)
                            {
                                foreach ($listMenu as $menu)
                                {
                                    echo ($first)?"<a class=\"active item\" href='".ABSOLUTE_PATH_FRONT . "page/view/".$menu["id"]."'>":"<a class=\"item\" href='".ABSOLUTE_PATH_FRONT . "page/view/".$menu["id"]."'>";
                                    $first = false;
                                    echo $menu["name"]."</a>";
                                }
                            }

                            else
                            {
                                echo "<a class=\"active item\">Accueil</a>";
                            }
                            ?>
                            <div class="right item">
                                <?php
                                    if(Helpers::is_logged())
                                    {
                                        echo "<a class=\"ui inverted button\" href=\"smw-admin\">Back</a>";
                                    }
                                    else{
                                        echo " <a class=\"ui inverted button\" href=\"login\">Log in</a>
                                <a class=\"ui inverted button\">Sign Up</a>";
                                    }
                                ?>

                            </div>
                        </div>
                    </div>

			<?php include $this->view; ?>
                </div>
        </section>
        <footer>
            
        </footer>
        <script src="/setupmywebsite/Public/js/index_front.js"></script>
	</body>
</html>