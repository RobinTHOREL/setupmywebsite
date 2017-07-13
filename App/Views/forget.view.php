	<header>
    </header>
	<section>
        <div class="back_glob">
            <div class="back_header">
                <h1>Mot de passe oublié</h1>
            </div>
            <?php if(empty($message)) {  ?>
            <form action="" method="post">
                <div class="trois-colonnes">
                    <div class="colonne2">
                        <input type="email" name="email" value="" class="form-group">
                    </div>

                    <div class="colonne2">
                        <input type="submit" name="submit" value="Envoyer" class="form-group">
                    </div>
                </div>
            </form>
            <?php  } else { 
            	echo $message;
            }
            ?>
            
        </div>
	</section>
    <footer>
    </footer>
