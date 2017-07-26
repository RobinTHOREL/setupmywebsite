<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $page_title ?></title>
		<meta name="description" content="<?php echo $page_description ?>">
        <link rel="stylesheet" href="/setupmywebsite/Public/css/style-front.css">
        <link rel="stylesheet" href="/setupmywebsite/Public/css/style-front2.css">
	</head>
	<body>
        <header></header>


            <!--Vue front-->
            <!--<h1>Setup-My.Website</h1><br>-->

            <!-- Following Menu -->
        <div class="nav-nav">
            <div class="ui large top fixed hidden menu">
                <div class="ui container">

                    <a class="active item">H²omeA</a>
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
                <div class="ui inverted vertical masthead center aligned">

                    <div class="ui container">
                        <div class="ui large secondary pointing menu">
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
                                    echo ($first)?"<a class=\"active item\" href='".ABSOLUTE_PATH_FRONT . "page/view/".$menu["id"]."'>":"<a class=\"item\" href='".ABSOLUTE_PATH_FRONT . "page/view/".$menu["id"]."'>";
                                    $first = false;
                                    echo $menu["name"]."</a>";
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
                                        echo " <a class=\"ui  button\" href='".ABSOLUTE_PATH_FRONT."login'>Log in</a>";
                                    }
                                ?>

                            </div>
                        </div>
                        <div class="ui middle aligned stackable grid container">

                            <div class="row">
                                <div class="eight wide column">
                                    <h3 class="ui header"><?php echo $page_title;?></h3>
                                    <p><?php echo $page_description;?></p>
                                </div>
                            </div>



                            <div class="row">
                                <div class="center aligned column">
                                    <a class="ui huge button">BottonTest</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <section>





        </section>
        <?php include $this->view; ?>
        <footer>
            <div class="ui inverted vertical footer segment">
                <div class="ui container">
                    <div class="ui stackable inverted divided equal height stackable grid">
                        <div class="three wide column">
                            <h4 class="ui inverted header">About</h4>
                            <div class="ui inverted link list">
                                <a href="#" class="item">Sitemap</a>
                                <a href="#" class="item">Contact Us</a>
                                <a href="#" class="item">Religious Ceremonies</a>
                                <a href="#" class="item">Gazebo Plans</a>
                            </div>
                        </div>
                        <div class="three wide column">
                            <h4 class="ui inverted header">Services</h4>
                            <div class="ui inverted link list">
                                <a href="#" class="item">Banana Pre-Order</a>
                                <a href="#" class="item">DNA FAQ</a>
                                <a href="#" class="item">How To Access</a>
                                <a href="#" class="item">Favorite X-Men</a>
                            </div>
                        </div>
                        <div class="seven wide column">
                            <h4 class="ui inverted header">Footer Header</h4>
                            <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="/setupmywebsite/Public/js/index_front.js"></script>
	</body>
</html>