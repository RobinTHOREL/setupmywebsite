<div class="container">
    <div class="row"> <!-- exemple - ligne 1 -->
        <div class="col-10 col-offset-1 title">
            <h2>Toutes les pages</h2>
        </div>
    </div>
    <!-- Pagination -->
    <div class="row">
    	<div class="col-12 title">
        	<?php 
                if($nbPages>1) {
                    echo '<ul class="pagination center-text ">';
                    for($i=1; $i<=$nbPages; $i++) {
                        if($i==$pageActuel) {
                            echo "<li><label class='pagi-pages'>".$i."</label></li>";
                        } else {
                            echo "<li><a href='".ABSOLUTE_PATH_BACK."pages/view/".$i."'>".$i."</a></li>";
                        }
                    }
                    echo '</ul>';
                }
            ?>
    	</div>
    </div>
    <div class="row"> <!-- exemple - ligne 2 -->
        <div class="col-12">
                    <?php
                    if(isset($results) && $results!==false) {
                        $i = 0;
                        foreach ($results as $page) {
                     ?>
                            <div class="<?php echo ($i % 4 == 0) ? 'col-2' : 'col-2 col-offset-1'; ?> page">
                            	<a href="<?php echo ABSOLUTE_PATH_BACK . "pages/edit/" . $page['id'] ?>">
                                    <div class="page_logo"> <!-- TODO : Mettre un href sur la vue front -->
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                    </div>
                                    <div class="page_title">
                                        <h3><?php echo htmlspecialchars($page['title']); ?></h3>
                                    </div>
                                </a>
                                <div class="page_button">
                                    <div class="row">
                                        <div class="col-4 page_action">
                                            <a href="<?php echo ABSOLUTE_PATH_BACK . "pages/edit/" . $page['id'] ?>">
                                                <i class="fa fa-pencil-square-o i_action"
                                                   aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="col-4 page_action">
                                         	<a href="<?php echo ABSOLUTE_PATH_BACK . "pages/preview/" . $page['id'] ?>">
                                            	<i class="fa fa-eye i_action" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="col-4 page_action">
                                            <a href="<?php echo ABSOLUTE_PATH_BACK . "pages/delete/" . $page['id'] ?>">
                                                <i class="fa fa-trash-o i_action" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
    