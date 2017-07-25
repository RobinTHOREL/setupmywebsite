/* DEBUT - FONCTIONNALITE D'UPLOAD DES MEDIAS */
/**
 * Created by Kush on 13/06/2017
 */
/* Drag and drop */
var file = null;
var fileName = null;
var fileSize = null;
var fileType = null;

$(document).on('dragenter', '#dropfile', function () {
    $(this).css('border', '3px dashed red', 'opacity', '1');
    return false;
});

$(document).on('dragover', '#dropfile', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).css('border', '3px dashed red');
    return false;
});

$(document).on('dragleave', '#dropfile', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).css('border', '3px dashed #BBBBBB');
    return false;
});

// Permet d'utiliser un bouton pour les périphérique tactile,
//  le click sur le bouton appelle le 'input file'
$("#dropfile_btn_upload").click(function (e) { 
	$("#dropfile_hidden_upload").click();
});
$("#dropfile_hidden_upload").change(function (e) { 
	onInput(document.getElementById('dropfile_hidden_upload').files);
});
function onInput(files) {
	if (files.length>0) {
        // On récupère les différentes variable pour les informations à afficher
        fileName = files[0].name;
        var calcSize = parseInt(files[0].size);
        calcSize = (isNaN(calcSize)) ? 0 : files[0].size;
        if(calcSize >= 1048576) {
        	fileSize = (calcSize / (1024*1024)).toFixed(2) + ' Mo';
        } else {
        	fileSize = (calcSize / 1024).toFixed(2) + ' Ko';
        }
        fileType = files[0].type;
        uploadConfig(files);
	}
}

$(document).on('drop', '#dropfile', onDrop);
function onDrop(e) {
	if (e.originalEvent.dataTransfer) {
        if (e.originalEvent.dataTransfer.files.length) {
            // Stop the propagation of the event
            e.preventDefault();
            e.stopPropagation();
            $(this).css('border', '3px dashed green');
            // On récupère les différentes variable pour les informations à afficher
            fileName = e.originalEvent.dataTransfer.files[0].name;
            var calcSize = parseInt(e.originalEvent.dataTransfer.files[0].size);
            calcSize = (isNaN(calcSize)) ? 0 : e.originalEvent.dataTransfer.files[0].size;
            if(calcSize >= 1048576) {
            	fileSize = (calcSize / (1024*1024)).toFixed(2) + ' Mo';
            } else {
            	fileSize = (calcSize / 1024).toFixed(2) + ' Ko';
            }
            fileType = e.originalEvent.dataTransfer.files[0].type;
            uploadConfig(e.originalEvent.dataTransfer.files);
        }
    } else {
        $(this).css('border', '3px dashed #BBBBBB');
    }
    return false;
}

function send(e) {
    var reader = new FileReader();
    reader.onload = handleReaderLoad;
    reader.readAsDataURL(file);
}

// Réinitialisation des paramètres
function quit() {
	document.getElementById("cover").style.display = "none";
	document.getElementById("dropfile_config").style.display = "none";
	file = fileName = fileSize = fileType = null;
	$('#df_cfg_img').attr("src", "");
    document.getElementById("df_cfg_title").value = "";
    document.getElementById("df_cfg_desc").value = "";
    document.getElementById("df_cfg_size").innerHTML = "";
    document.getElementById("df_cfg_type").innerHTML = "";
	document.getElementById("df_cfg_btn_send").removeEventListener("click", send);
	document.getElementById("df_cfg_btn_cancel").removeEventListener("click", quit);
}

function uploadConfig(files) {
    file = files[0];

    // Vérifie le type de l'image
    if (!file.type.match('image/png') && !file.type.match('image/jpg') && !file.type.match('image/jpeg')) {
    	$("#response_media").html("<span>L'extension n'est pas acceptée. </span>").css('display', 'block');
        return false;
    }
    
	// On affiche la fenêtre de configuration
    document.getElementById("cover").style.display = "block";
    document.getElementById("dropfile_config").style.display = "block";
    
    // Charge l'image sur la fenêtre d'informations
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#df_cfg_img').attr("src", e.target.result);
            document.getElementById("df_cfg_title").value = fileName;
            document.getElementById("df_cfg_size").innerHTML = fileSize;
            document.getElementById("df_cfg_type").innerHTML = fileType;
        }
        reader.readAsDataURL(file);
    }
    
    // Envoie les informations lors du clic sur le bouton Envoyer
    document.getElementById("df_cfg_btn_send").addEventListener("click", send);
    
    // Ferme la fenêtre avec le bouton fermer
    document.getElementById("df_cfg_btn_cancel").addEventListener("click", quit);
}

function handleReaderLoad(evt) {
    var pic = {};
    pic.fileName = fileName;
    pic.fileTitle = document.getElementById("df_cfg_title").value;
    pic.fileDesc = document.getElementById("df_cfg_desc").value;
    pic.file = evt.target.result.split(',')[1];
    var str = jQuery.param(pic);

    $.ajax({
        type: 'POST',
        url: 'upload',
        data: str,
        success: function (data) {
        	if(data.status == "success") {
        		$("#response_media").html("<span>Le fichier a été ajouté à la <a href='view'>bibliothèque</a></span><br>").css('display', 'block');
        		quit();
        	} else if(data.status == "error"){
        		var msgError = "<span>Erreur lors de l'envoie du fichier :</span><br><ul>";
        		if (typeof data.message != "undefined" && data.message != null) {
        			for (var i=0; i<data.message.length; i++) {
        				msgError += "<li>"+data.message[i]+"</li>";
        			}
        		}
        		msgError += "</ul>";
        		$("#response_media").html(msgError).css('display', 'block');
        	}
        },
        error : function(result, status, error){
        	$("#response_media").html("<span>Erreur lors de l'envoie du fichier.</span><br>").css('display', 'block');
        }
    });
}
/* FIN - FONCTIONNALITE D'UPLOAD DES MEDIAS */
