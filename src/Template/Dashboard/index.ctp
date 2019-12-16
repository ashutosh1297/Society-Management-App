<div class="container-fluid wrapper-div">
        <div class="row">
            <div class="col-md-3">
                <div class="card dashboard-card text-white bg-primary mb-3" onclick="window.location = '/Society-Management-App/Societies'"onclick="window.location = '/Society-Management-App/Societies'" style="max-width: 20rem;">
                    <div class="card-header">Societies</div>
                    <div class="card-body">
                        <h6 class="card-title">
                            Societies: <?php echo($societies)?>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card dashboard-card text-white bg-info mb-3" onclick="window.location = '/Society-Management-App/Members'"onclick="window.location = '/Society-Management-App/Societies'" style="max-width: 20rem;">
                    <div class="card-header">Members</div>
                    <div class="card-body">
                        <h6 class="card-title">
                            Members: <?php echo($members)?>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card dashboard-card text-white bg-primary mb-3" onclick="window.location = '/Society-Management-App/Units'"onclick="window.location = '/Society-Management-App/Societies'" style="max-width: 20rem;">
                    <div class="card-header">Units</div>
                    <div class="card-body">
                        <h6 class="card-title">
                            Units: <?php echo($homes)?>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card dashboard-card text-white bg-primary mb-3" onclick="window.location = '/Society-Management-App/Complaints'"onclick="window.location = '/Society-Management-App/Societies'" style="max-width: 20rem;">
                    <div class="card-header">Complaints</div>
                    <div class="card-body">
                        <h6 class="card-title">
                            Complaints: <?php echo($complaints)?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TODOO: Add more charts for reports like unit(rental, residential, commercial) etc. -->
    <div class="reports">
        <canvas id="complaintsChart"></canvas>
        <h6>Complaints Report</h6>
    </div>
    <?php 
    $complaintsChartArray = [$complaintsQuery->find('all')->select('status')->where(['status' => 0])->count(),
            $complaintsQuery->find('all')->select('status')->where(['status' => 1])->count(),
            $complaintsQuery->find('all')->select('status')->where(['status' => 2])->count(),
        ];
    ?>
    <script>
        window.onload = (function (){
            var ctx = document.getElementById('complaintsChart').getContext('2d');
            var dataArray = [<?php echo join(',',$complaintsChartArray); ?>];
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                labels: ['Fresh', 'In process', 'Done'],
                datasets: [{
                    label: '# of Tomatoes',
                    // data: [12, 19, 3, 5],
                    data: dataArray,
                    backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
                },
                options: {
                    cutoutPercentage: 50,
                    responsive: true,
                }
            });
        })    
    </script>