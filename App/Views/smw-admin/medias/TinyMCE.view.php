
	<header></header>
    <section>
        <div class="row main">
            <?php
            if(!empty($files)) {
                for ($i = 0; $i < count($files); $i ++) {
                    ?>
                    <div class="image-hover" id="<?php echo "image-".$i; ?>">
                        <img class="img_media" src="<?php echo BASE_ABSOLUTE_PATTERN.$files[$i]['link'] ?>" 
                        	alt="<?php echo $files[$i]['description'] ?>">
                    </div>
                    <?php
                }   
            }
            ?>
        </div>
     </section>
        <!-- Pagination -->
        <div class="row footer">
        	<?php 
                if($nbPages>1) {
                    echo '<ul class="pagination center-text ">';
                    for($i=1; $i<=$nbPages; $i++) {
                        if($i==$pageActuel) {
                            echo "<li><label>".$i."</label></li>";
                        } else {
                            echo "<li><a href='".ABSOLUTE_PATH_BACK."multimedia/pluginTiny/".$i."'>".$i."</a></li>";
                        }
                    }
                    echo '</ul>';
                }
            ?>
        </div>

    <footer></footer>

    <script>
    	// Cette fonction permet de communiquer avec la page parente sur l'image sélectionné
    	function onClick() {
    		var elementSelect = document.getElementsByClassName("selected");
    		for (var i = 0; i<elementSelect.length; i++) {
    			elementSelect[i].classList.remove("selected");
    		}
    		this.className += " selected";
    		
    	    var c = this.childNodes;
    	    var url = "";
    	    var alt = "";
    	    for (var i = 0; i < c.length; i++) {
        	    if(c[i].nodeName == "IMG") {
            	    // On envoie les src et le alt
        	    	url = c[i].src;
        	    	alt = c[i].alt;
        	    }
    	    }
    	    if(url != "") {
    			window.parent.selectedItemCallback(url, alt);
    	    }
    	}
	
    	var el = document.getElementsByClassName("image-hover");

    	for (var i = 0; i<el.length; i++) {
    		el[i].addEventListener("click", onClick);
    	}    	
    </script>
    