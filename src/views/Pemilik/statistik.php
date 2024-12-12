<?php require './views/Components/Head.php' ?>

<body class="font-roboto bg-gray-200 text-black">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Statistik</h1>
        </div>
    </nav>

    <div class="container mx-auto px-6">

        <!-- Statistik Kost Joyle Dalam 1 Bulan -->
        <section class="my-12">
            <div class="bg-white rounded-lg p-6 shadow">
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">STATISTIK KOST JOYLE DALAM 1 BULAN
                </h2>
                <p class="text-center text-gray-600 mb-6">Laporan statistik berdasarkan data kamar terjual yang tercatat
                    setiap bulan.</p>
                <div class="mt-6 flex justify-center items-center">
                    <canvas id="monthlyChart" class="w-full md:max-w-4xl h-48"></canvas>
                </div>
            </div>
        </section>

        <!-- Bulan Navigator -->
        <div class="flex justify-center space-x-2 md:space-x-4 mt-6 flex-wrap">
            <?php 
            $months = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];
            foreach ($months as $index => $month) { 
            ?>
            <button class="text-white px-4 py-2 rounded-lg hover:opacity-90 transition duration-300"
                style="background-color: #68422d;" onclick="updateChart(<?= $index ?>)">
                <?= $month ?>
            </button>
            <?php } ?>
        </div>

        <!-- Statistik Kost Joyle Dalam 1 Tahun -->
        <section class="my-12 grid grid-cols-1 md:grid-cols-2 gap-6">
        </section>

        <!-- Hasil Riset Section -->
        <section class="my-12">
            <div class="bg-white rounded-lg p-6 shadow">
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">HASIL RISET KOST JOYLE 2023</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Berdasarkan analisis dari diagram, berikut hasil yang disimpulkan:
                </p>
                <ul class="list-disc ml-6 space-y-2 text-gray-600">
                    <li>Pada bulan Januari, jumlah yang tercatat sekitar 700.</li>
                    <li>Bulan Februari mengalami peningkatan mendekati 750.</li>
                    <li>Maret menunjukkan peningkatan signifikan dengan jumlah sekitar 850.</li>
                    <li>April mengalami penurunan dengan jumlah mendekati 800.</li>
                    <li>Bulan Mei adalah bulan dengan jumlah tertinggi hingga 950.</li>
                    <li>Pada bulan Juni, terjadi penurunan signifikan hingga 650.</li>
                </ul>
            </div>
        </section>

        <!-- Footer Section -->
        <!-- Footer Section -->
<footer>
    <div class="container mx-auto px-6 py-12">
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white text-black border border-black-400 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 text-black">
                        <th class="border py-2 px-4">No</th>
                        <th class="border py-2 px-4">Informasi</th>
                        <th class="border py-2 px-4">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Alamat</td>
                        <td class="border px-4 py-2">Jl. Simo Utara - Jombang</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">2</td>
                        <td class="border px-4 py-2">Kontak</td>
                        <td class="border px-4 py-2">085374897826</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">3</td>
                        <td class="border px-4 py-2">Email</td>
                        <td class="border px-4 py-2">aguzsuscipta@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">4</td>
                        <td class="border px-4 py-2">Website</td>
                        <td class="border px-4 py-2">www.kostjoyle.com</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">5</td>
                        <td class="border px-4 py-2">Social Media</td>
                        <td class="border px-4 py-2">Instagram @kostjoyle</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</footer>
 
        <td class="border px-4 py-2">Social Media</td>
                                    <td class="border px-4 py-2">Instagram @kostjoyle</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </footer>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Daily data for each month (sales alternate every other day)
    const data = {
        "Januari": [
            30, 0, 32, 0, 35, 0, 38, 0, 40, 0, 42, 0, 45, 0, 47, 0, 50, 0, 52, 0, 55, 0, 57, 0, 60, 0, 62, 0,
            65, 0, 55
        ],
        "Februari": [
            25, 0, 28, 0, 30, 0, 32, 0, 35, 0, 37, 0, 40, 0, 42, 0, 45, 0, 47, 0, 50, 0, 52, 0, 55, 0, 57, 0,
            60, 0
        ],
        "Maret": [
            30, 0, 35, 0, 32, 0, 40, 0, 42, 0, 30, 0, 33, 0, 31, 0, 36, 0, 37, 0, 41, 0, 39, 0, 32, 0, 35, 0,
            38, 0, 33
        ],
        "April": [
            28, 0, 30, 0, 33, 0, 35, 0, 37, 0, 40, 0, 42, 0, 44, 0, 46, 0, 48, 0, 50, 0, 52, 0, 54, 0, 56, 0,
            58, 0, 10
        ],
        "Mei": [
            40, 0, 43, 0, 45, 0, 47, 0, 50, 0, 52, 0, 54, 0, 56, 0, 58, 0, 60, 0, 62, 0, 64, 0, 66, 0, 68, 0,
            70, 0, 20
        ],
        "Juni": [
            20, 0, 22, 0, 25, 0, 28, 0, 30, 0, 33, 0, 35, 0, 37, 0, 40, 0, 42, 0, 45, 0, 47, 0, 50, 0, 52, 0,
            55, 0, 22
        ],
        "Juli": [
            30, 0, 32, 0, 35, 0, 37, 0, 4, 0, 42, 0, 45, 0, 47, 0, 50, 0, 52, 0, 15, 0, 57, 0, 60, 0, 62, 0,
            65, 0, 44
        ],
        "Agustus": [
            28, 0, 30, 0, 32, 0, 35, 0, 7, 0, 40, 0, 42, 0, 45, 0, 47, 0, 50, 0, 52, 0, 23, 0, 57, 0, 59, 0,
            62, 0, 64
        ],
        "September": [
            30, 0, 32, 0, 34, 0, 37, 0, 40, 0, 42, 0, 45, 0, 47, 0, 50, 0, 52, 0, 55, 0, 57, 0, 60, 0, 6, 0,
            65, 0, 8
        ],
        "Oktober": [
            25, 0, 28, 0, 30, 0, 33, 0, 35, 0, 38, 0, 40, 0, 42, 0, 45, 0, 47, 0, 50, 0, 52, 0, 55, 0, 57, 0,
            60, 0, 62
        ],
        "November": [
            30, 0, 32, 0, 35, 0, 37, 0, 40, 0, 42, 0, 45, 0, 47, 0, 60, 0, 52, 0, 55, 0, 57, 0, 60, 0, 62, 0,
            65, 0, 6
        ],
        "Desember": [
            35, 0, 37, 0, 0, 0, 42, 0, 5, 0, 47, 0, 50, 0, 52, 0, 55, 0, 57, 0, 60, 0, 62, 0, 65, 0, 67, 0,
            70, 0, 9
        ]
    };

    // Initial chart configuration
    let monthlyChart = new Chart(document.getElementById('monthlyChart'), {
        type: 'bar',
        data: {
            labels: Array.from({
                length: 31
            }, (_, i) => `Hari ${i + 1}`), // Labels for 31 days of a month
            datasets: [{
                label: 'Penjualan',
                data: data["Januari"], // Default data (January)
                backgroundColor: '#68422d'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Function to update chart data
    function updateChart(monthIndex) {
        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        const month = monthNames[monthIndex];

        monthlyChart.data.labels = Array.from({
            length: 31
        }, (_, i) => `Hari ${i + 1}`); // 31 days for any month

        monthlyChart.data.datasets[0].data = data[month];
        monthlyChart.update();
    }
    </script>

</body>

<?php require "./views/Components/Foot.php" ?>