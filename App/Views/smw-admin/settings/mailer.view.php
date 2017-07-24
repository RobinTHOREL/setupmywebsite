    
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
                        	<label>Hôte<input type="text" class="form-group" name="host" placeholder="Hôte"></label>
                        	<label>Port<input type="text" class="form-group" name="port" placeholder="Port"></label>
                        	<label>Type de sécurisation<select class="form-group" name="smtp-secure"><option>TLS</option></select></label><br>
                        	<label><input type="text" class="form-group" name="smtp-username" placeholder="SMTP Username"></label><br>
                        	<label><input type="password" class="form-group" name="smtp-password" placeholder="SMTP Password"></label><br>
                        	<label><input type="email" class="form-group" name="from-email" placeholder="From:email"></label><br>
                        	<label><input type="text" class="form-group" name="from-username" placeholder="From:Username"></label><br>
                        	<br>
    						<input type="submit">
						</form>
            		</div>
        		</div>
            </div>
        </div>
    </div>
    