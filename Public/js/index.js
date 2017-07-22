/**
 * Created by Kush on 13/06/2017.
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
            fileSize = e.originalEvent.dataTransfer.files[0].size;
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

function quit() {
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
    	$("#response_media").append("<span>L'extension n'est pas acceptée. </span>").css('display', 'block');
        return false;
    }
    
	// On affiche la fenêtre de configuration
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
    pic.fileSize = fileSize;
    pic.fileType = fileType;
    pic.file = evt.target.result.split(',')[1];
    var str = jQuery.param(pic);

    $.ajax({
        type: 'POST',
        url: 'upload',
        data: str,
        success: function (data) {
        	if(data == "OK") {
        		$("#response_media").append("<span>Le fichier a été ajouté à la <a href='view'>bibliothèque</a></span><br>").css('display', 'block');
        	} else {
        		$("#response_media").append("<span>Erreur lors de l'envoie du fichier.</a></span><br>").css('display', 'block');
        		console.log("Erreur lors de l'envoie.");
        	}
            
            quit();
        },
        error : function(result, status, error){
        	console.log(result);
        	console.log(status);
        	console.log(error);
        }
    });
}

/* Chart on dashboard page */
new Chart(document.getElementById("bar-chart").getContext("2d"), {
    type: 'bar',
    data: {
        labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai"],
        datasets: [
            {
                label: "Nombre de visiteurs",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: [200,198,249,299,236],
                fontColor: 'white'
            }
        ]
    },
    options: {
        legend: {display: false},
        title: {
            display: true,
            text: 'Nombre de connexion mensuel',
            fontColor: 'white'
        },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: 'white'
                    }
                }]
            }
        }
});

new Chart(document.getElementById("doughnut-chart").getContext("2d"), {
    type: 'doughnut',
    data: {
        labels: ["Robin", "Sinicha", "Younes", "Onesie", "Chen"],
        datasets: [{
            label: "",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
            data: [2478,5267,734,784,433],
            fontColor: 'white'
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Nombre de publication sur le site (article+page/utilisateur)',
            fontColor: 'white'
        },
        legend: {
                display: false
        }
    }
});