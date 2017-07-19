    <div class="container">
        <div class="row">
            <div class="col-12 title">
                <h2>Modifier les réglages SMW</h2>
            </div>
            <div class="row">
                <div class="col-12">
                	<!-- Barre de menu -->
                    <div class="menuTab">
                      <a href="index" class="">Global</a>
                      <a href="mailer" class="active">Mailer</a>
                    </div>
                    
                    <!-- Menu sélectionné -->
                    <div id="Mailer" class="tabContent">
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