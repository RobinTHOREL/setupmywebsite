<div class="container">
    <div class="row"> <!-- exemple - ligne 1 -->
        <div class="col-10 col-offset-1 title">
            <h2>Tableau de bord</h2>
        </div>
        <div class="row">
            <div class="col-4 col-offset-1">
                <div class="canvas_container" style="">
                    <canvas id="doughnut-chart" width="260" height="200"></canvas>
                </div>
            </div>
            <div class="col-5 col-offset-1">
                <div class="canvas_container">
                    <canvas id="bar-chart" width="180" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /* Chart on dashboard page */ 
    new Chart(document.getElementById("doughnut-chart").getContext("2d"), {
        type: 'doughnut',
        data: {
            labels: [
                    <?php 
                    foreach($statsUserPost as $user) {
                        echo "'".$user[0]."', ";
                    }   
                    ?>
				],
            datasets: [{
                label: "",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: [
                        <?php 
                        foreach($statsUserPost as $user) {
                            echo "'".$user[1]."', ";
                        }   
                        ?>],
                fontColor: 'white'
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Nombre de publication sur le site (Articles/utilisateurs)',
                fontColor: 'white'
            },
            legend: {
                    display: false
            }
        }
    });

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
</script>