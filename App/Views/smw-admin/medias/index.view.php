    <div class="container">
        <div class="row">
            <div class="col-10 col-offset-1 title">
                <h2>Bibliothèque des médias</h2>
            </div>
        </div>
        <div class="row"> <!-- exemple - ligne 2 -->
            <div class="col-10 col-offset-1">
                <table class="table_media">
                    <tr>
                    <?php
                    if(isset($files) && $files!==false) {
                        $i = 0;
                        foreach ($files as $media) {
                            if($i%3 == 0) {
                                echo "</tr><tr>";
                            }
                                ?>
                                <td>
                                    <div class="image-hover">
                                        <a href="edit/<?php echo $media['id'] ?>">
                                        	<img class="img_media" 
                                        		src="<?php echo ABSOLUTE_PATH_FRONT . $media['link'] ?>" 
                                        		alt="<?php echo $media['description'] ?>">
                                        </a>
                                        <div class="layer"></div>
                                    </div>
                                </td>
                                <?php
                                $i++;
                        }
                    }
                    ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>