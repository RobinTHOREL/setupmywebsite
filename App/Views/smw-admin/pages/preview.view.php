
        <div class="ui text container">
            <h1 class="ui inverted header">
                Prévisualisation
            </h1>
        </div>

        <div class="ui vertical stripe segment">
            <div class="ui middle aligned stackable grid container">
                <div class="row">
                    <div class="eight wide column">
						<?php 
						    if(isset($pageExist) && $pageExist) {
						        if(isset($postExist)) {
						            echo $post->getTitle();
                                    echo $post->getContent(); 
						        } else {
						            echo "<h3>La page n'a aucun article rattaché.</h3>";
						        }
                            }
                         ?>
                    </div>
                </div>
            </div>
        </div>
