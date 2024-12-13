<?php require './views/Components/Head.php' ?>
<body class="min-h-screen flex">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
    <?php require "./views/Components/sidebarAdmin.php" ?>
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
        <div class="flex">
            <h1 class="p-5 font-Roboto-bold">Berita</h1>
            <i class="ml-auto fas fa-bell text-warna-second text-[15px] p-5"></i>
        </div>

        <div class="bg-white rounded-lg shadow-md shadow-slate-400 ml-4 mr-4">
            <h1 class="p-4">Pengunjung</h1>
            <div class="flex">
                <h1 class="pl-4 text-3xl">3.000</h1>
                <p class="text-green-600 text-xs pl-2 py-4">+200%</p>
            </div>
            <!-- <p class="p-4 text-gray-500 text-xs">(125 AVG views)</p> -->
            <div class="flex">
                <canvas id="myChart" width="400" height="200" class="p-5"></canvas>
                <div class="grid grid-cols-2 grid-rows-2 gap-4 p-5">
                    <div class="">
                        <h1>Total Pengunjung</h1>
                        <h1 class="font-Roboto-bold text-3xl">100</h1>
                        <!-- <div class="flex">
                            <h1 class="text-sm flex">yesterday<p class="text-red-600 pl-5">(-30%)</p></h1>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" style="padding-top: 5px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div> -->
                    </div>
                    <div class="">
                    <h1>Jumlah Pengguna</h1>
                        <h1 class="font-Roboto-medium text-3xl">1100</h1>
                        <!-- <div class="flex">
                            <h1 class="text-sm flex">yesterday<p class="text-red-600 pl-5">(-30%)</p></h1>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" style="padding-top: 5px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div> -->
                    </div>
                    <div class="">
                    <h1>Like</h1>
                        <h1 class="font-Roboto-bold text-3xl">2222</h1>
                        <!-- <div class="flex">
                            <h1 class="text-sm flex">yesterday<p class="text-green-500 pl-5">(+30%)</p></h1>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-400" style="padding-top: 5px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="p-5 flex justify-between items-center">
                <h2 class="text-xl font-bold p-5">Daftar Berita</h2>
                <a href="tambahBerita" class="px-4 py-2 bg-base-color text-white text-sm font-medium rounded hover:bg-warna-second">Tambah Berita</a>
            </div>
        </div>

        <div class="p-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Judul Berita</th>
            <th scope="col" class="px-6 py-3">Deskripsi Berita</th>
            <th scope="col" class="px-6 py-3">Kategori</th>
            <th scope="col" class="px-6 py-3">Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Keluhan Pemilik Kost
            </th>
            <td class="px-6 py-4">Pemilik kost tidak merespons pemesanan lebih dari 3 hari, menghambat proses penyewaan.</td>
            <td class="px-6 py-4">Pengaduan</td>
            <td class="px-6 py-4 text-xs">2024-12-01</td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Ketidaksesuaian Deskripsi
            </th>
            <td class="px-6 py-4">Fasilitas kost tidak sesuai dengan deskripsi yang tercantum di aplikasi.</td>
            <td class="px-6 py-4">Verifikasi</td>
            <td class="px-6 py-4 text-xs">2024-12-05</td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Masalah Pembayaran
            </th>
            <td class="px-6 py-4">Proses pembayaran mengalami kegagalan dalam verifikasi di aplikasi.</td>
            <td class="px-6 py-4">Teknis</td>
            <td class="px-6 py-4 text-xs">2024-12-08</td>
        </tr>
    </tbody>
</table>

        </div>
    </main>
    <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line', // Jenis grafik: bar, line, pie, dll.
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei'], // Label sumbu X
            datasets: [{
                label: 'Pengunjung',
                data: [120, 190, 300, 500, 200], // Data sumbu Y
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false, 
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true // Memulai sumbu Y dari 0
                }
            }
        }
    });
    </script>
</body>
<?php require './views/Components/Foot.php' ?>