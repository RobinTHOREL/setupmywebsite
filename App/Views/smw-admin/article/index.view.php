    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 col-offset-1 title">
                <h2>Tous les articles</h2>
            </div>
        </div>
        <div class="row"> <!-- exemple - ligne 2 -->
            <div class="col-12">
					<?php 
						if(isset($results) && $results!==false) {
                            $i = 0;
                            foreach ($results as $posts) {
                                ?>

                                <a href="<?php echo ABSOLUTE_PATH_BACK . "articles/edit/" . $posts['id'] ?>">
                                    <div class="<?php echo ($i % 4 == 0) ? 'col-2' : 'col-2 col-offset-1'; ?> article">
                                        <div class="article_logo"> <!-- TODO : Mettre un href sur la vue front -->
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </div>
                                        <div class="article_title">
                                            <h3><?php echo $posts['title']; ?></h3>
                                        </div>
                                        <div class="article_button">
                                            <div class="row">
                                                <div class="col-4 article_action">
                                                    <a href="<?php echo ABSOLUTE_PATH_BACK . "articles/edit/" . $posts['id'] ?>">
                                                        <i class="fa fa-pencil-square-o i_action"
                                                           aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="col-4 article_action">
                                                    <i class="fa fa-share i_action" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-4 article_action">
                                                    <a href="<?php echo ABSOLUTE_PATH_BACK . "articles/delete/" . $posts['id'] ?>">
                                                        <i class="fa fa-trash-o i_action" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                        }
					?>
            </div>
        </div> <!-- exemple - ligne 2 -->
    </div>
