/**
 * Created by Kush on 13/06/2017.
 */

/* Drag and drop */
$(document).on('dragenter', '#dropfile', function () {
    $(this).css('border', '3px dashed red');
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

var fileName = null;
$(document).on('drop', '#dropfile', function (e) {
    if (e.originalEvent.dataTransfer) {
        if (e.originalEvent.dataTransfer.files.length) {
            // Stop the propagation of the event
            e.preventDefault();
            e.stopPropagation();
            $(this).css('border', '3px dashed green');
            // Main function to upload
            fileName = e.originalEvent.dataTransfer.files[0].name;
            upload(e.originalEvent.dataTransfer.files);
        }
    } else {
        $(this).css('border', '3px dashed #BBBBBB');
    }
    return false;
});

function upload(files) {
    var f = files[0];

    if (!f.type.match('image/png')) {
        alert('image doesn\'t match');
        return false;
    }
    var reader = new FileReader();

    // When the image is loaded,
    // run handleReaderLoad function
    reader.onload = handleReaderLoad;

    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}

function handleReaderLoad(evt) {
    var pic = {};
    pic.fileName = fileName;
    pic.file = evt.target.result.split(',')[1];
    
    var str = jQuery.param(pic);

    $.ajax({
        type: 'POST',
        url: 'upload',
        data: str,
        success: function (data) {
            //console.log(data);
        }
    });
}

$('#cancel-btn').click(function() {
    window.history.back();
});

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