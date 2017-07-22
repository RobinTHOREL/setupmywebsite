    
    <section>
        <div class="row"> <!-- exemple - ligne 2 -->
            <div class="col-10 col-offset-1">
                <?php
                if(!empty($files)) {
                    for ($i = 0; $i < count($files); $i ++) {
                        ?>
                        <div class="image-hover" id="<?php echo "image-".$i; ?>">
                            <img class="img_media" src="<?php echo ABSOLUTE_PATH_FRONT.$files[$i]['link'] ?>" 
                            	alt="<?php echo $files[$i]['description'] ?>">
                        </div>
                        <?php
                    }   
                }
                ?>
            </div>
        </div>
    </section>

    <script>
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
    