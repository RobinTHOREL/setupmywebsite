    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 col-offset-1 title">
                <h2>Envoyer un média</h2>
            </div>
            <div class="row"> <!-- exemple - ligne 2 -->
                <div class="col-10 col-offset-1">
                    <div id="dropfile">
                        <div id="dropper" class="col-8 col-offset-2">
                            <i class="fa fa-cloud-upload logo-upload" aria-hidden="true"></i>
                            <p>Glissez un média dans cette zone pour l'uploader</p>
                            <p>Formats acceptés : (png, jpg, jpeg)</p>
                        </div>
                    </div>
                    <div id="dropfile_config">
      					<div id="df_cfg_header">Informations de l'image</div>
      					<div id="df_cfg_body">
                            <div class="div-1-3">
                            	<img id="df_cfg_img" src="#" alt="" width="120px" height="120px"/>
                            </div>
                            <div class="div-2-3">
                                <label>Nom : <input type="text" name="filetitle" id="df_cfg_title" value="" maxlength="60"></label><br>
                                <label>Description : <input type="text" name="filedesc" id="df_cfg_desc" maxlength="120"></label><br>
                                <label>Taille : </label><label id="df_cfg_size"></label><br>
                                <label>Type : </label><label id="df_cfg_type"></label>
                            </div>
      					</div>
      					<div id="df_cfg_button">
      						<button id="df_cfg_btn_cancel">Annuler</button>
       						<button id="df_cfg_btn_send">Envoyer</button>
      					</div>
                    </div>
                    <div id="response_media" class="col-8 col-offset-2">
                    </div>
                </div>
                <div id='hide'>
                    <!--
                    <input type='button' name='upload' value='télécharger un fichier' />
                    -->
                </div>
            </div>
        </div>
    </div>
