<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $page_title ?></title>
		<meta name="description" content="<?php echo $page_description ?>">
        <link rel="stylesheet" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/css/style_front.css">
	</head>
	<body>
        <header></header>
        <section>

            <!--Vue front-->
            <!--<h1>Setup-My.Website</h1><br>-->

            <!-- Following Menu -->
            <div class="ui large top fixed hidden menu">
                <div class="ui container">

                    <a class="active item">HomeA</a>
                    <a class="item">Item nav setbyadmin</a>
                    <a class="item">Item nav setbyadmin</a>
                    <a class="item" href="login">Login</a>
                    <div class="right menu">
                        <div class="item">
                            <a class="ui button">Log in</a>
                        </div>
                        <div class="item">
                            <a class="ui primary button">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <div class="ui vertical inverted sidebar menu">
                <!--    Faire une boucle sur un getMenu(); dans la fenetre menu. (widget?)-->
                <a class="active item">HomeOU</a>
                <a class="item">Item nav setbyadmin</a>
                <a class="item">Item nav setbyadmin</a>
                <a class="item" href="login">Login</a>
            </div>


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
                            if ($listMenu != 0)
                            {
                                foreach ($listMenu as $menu)
                                {
                                    echo ($first)?"<a class=\"active item\">":"<a class=\"item\">";
                                    $first = false;
                                    echo $menu["title"]."</a>";
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
            </div>
        </section>
        <footer>
            
        </footer>
        <script src="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/js/index_front.js"></script>
	</body>
</html>