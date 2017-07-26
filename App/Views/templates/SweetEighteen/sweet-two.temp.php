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
                                    <?php
                                    if(!empty($posts))
                                    {
                                        foreach ($posts as $post) {
                                            echo '<h3 class="ui header">'.$post["title"].'</h3>';
                                            echo '<p>'.$post["content"].'</p>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
            <?php include $this->view; ?>

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