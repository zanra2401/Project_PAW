<?php 
    require "./views/Components/Head.php"; 
    
    $foto_profile = $data['data_user'][0]['profile_user'];

?>
    <script src="<?= JS ?>/libs/chart.js"></script>
    <script src="<?= JS ?>/libs/fullcalendar.js"></script>    
    <body class="overflow-hidden flex p-0 m-0 h-screen ">
        <?php require "./views/Components/sidebarPemilik.php" ?>
        <main class="flex-1 flex flex-col p-5 overflow-y-auto">
            <span class="mb-3 font-Roboto-medium h-10 text-gray-600"> <i class="fas fa-chart-simple"></i> <a href="">Dash Board</a> <i class="fas fa-chevron-right"></i> </span>
            <div class="container">
                <div class="w-full h-16 border-gray-300 rounded-lg overflow-hidden bg-gray-300 border flex items-center  ">
                    <span class="inline-block p-4">
                        <p class="text-sm font-Roboto-medium">Total Transaksi</p>
                        <span><i class="fas fa-rotate text-xl font-Roboto-bold text-gray-900"></i> <span class="ml-1 text-xl text-gray-900"><?= count($data['transaksi']) ?></span></span>
                    </span>
                    <a href="/<?= PROJECT_NAME ?>/pemilik/transaksihistory" class="h-full ml-auto flex items-center  bg-warna-second w-52 justify-center">
                        <i class="fas text-white fa-money-bill"></i>
                        <span class="font-Roboto-medium text-white ml-3">Transaksi History</span>
                    </a>
                </div>

                <div class="w-full h-fit p-4 mt-5 bg-gray-100 min-h-7 rounded-lg">
                    <canvas id="chart" class="w-[900px]"></canvas>
                </div>

                <div class="w-full h-fit mt-5" id="date">

                </div>
            </div>
        </main>
        <script>
            const ctx = document.getElementById("chart");
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?= json_encode(array_keys($data['transaksi_data'])); ?>,
                    datasets: [{
                        label: 'Data Transaksi',
                        data: <?= json_encode(array_values($data['transaksi_data'])) ?>,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                    },
                })
            
            const calendarElement = document.getElementById("date");
            var calendar = new FullCalendar.Calendar(calendarElement, {
                initialView: "dayGridMonth"
            });
        calendar.render();
        </script>
    </body>
<?php require "./views/Components/Foot.php"; ?>