    
    <div class="container">
        <div class="row">
            <div class="col-11">
            	<!-- Barre de menu -->
                <div class="menuTab">
                  <a href="view" class="">Global</a>
                  <a href="mailer" class="active">Mailer</a>
                </div>
                
                <!-- Menu sélectionné -->
                <div class="col-10 col-offset-1 title">
            		<h3>Configuration mailing</h3>
       			</div>
        		<div class="row"> <!-- exemple - ligne 2 -->
            		<div class="col-6 col-offset-3">
                    	<form action="" method="POST">
                        	<label>Hôte<input type="text" maxlength="2048" class="form-group" name="host" placeholder="Hôte" value="<?php echo (MAIL_HOST)?MAIL_HOST:""; ?>"></label>
                        	<label>Port<input type="number" min="1" max="999" class="form-group" name="port" placeholder="Port" value="<?php echo (MAIL_PORT)?MAIL_PORT:""; ?>"></label>
                        	<label>Type de sécurisation<select class="form-group" name="smtp-secure"><option>TLS</option></select></label><br>
                        	<label><input type="text" maxlength="255" class="form-group" name="smtp-username" placeholder="SMTP Username" value="<?php echo (MAIL_SMTP_USERNAME)?MAIL_SMTP_USERNAME:""; ?>"></label><br>
                        	<label><input type="password" maxlength="2048" class="form-group" name="smtp-password" placeholder="SMTP Password"></label><br>
                        	<label><input type="email" maxlength="320" class="form-group" name="from-email" placeholder="From:email" value="<?php echo (MAIL_FROM_EMAIL)?MAIL_FROM_EMAIL:""; ?>"></label><br>
                        	<label><input type="text" maxlength="255" class="form-group" name="from-username" placeholder="From:Username" value="<?php echo (MAIL_FROM_USERNAME)?MAIL_FROM_USERNAME:""; ?>"></label><br>
                        	<br>
    						<input type="submit">
						</form>
            		</div>
        		</div>
            </div>
        </div>
    </div>
    