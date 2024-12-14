<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-md py-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Statistik</h1>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-6">
        <!-- Statistik Kost per Bulan -->
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-800 text-center mb-2">Statistik Kost Joyle Dalam 1 Bulan</h2>
            <p class="text-sm text-gray-600 text-center mb-4">Laporan statistik berdasarkan data kamar terjual setiap
                hari dalam satu bulan</p>
            <canvas id="monthlyChart" class="w-full max-w-3xl mx-auto h-64"></canvas>
        </section>

        <!-- Buttons for Months -->
        <div class="flex flex-wrap justify-center gap-4 mb-6">
            <button onclick="updateChart(0)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Januari</button>
            <button onclick="updateChart(1)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Februari</button>
            <button onclick="updateChart(2)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Maret</button>
            <button onclick="updateChart(3)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">April</button>
            <button onclick="updateChart(4)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Mei</button>
            <button onclick="updateChart(5)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Juni</button>
            <button onclick="updateChart(6)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Juli</button>
            <button onclick="updateChart(7)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Agustus</button>
            <button onclick="updateChart(8)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">September</button>
            <button onclick="updateChart(9)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Oktober</button>
            <button onclick="updateChart(10)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">November</button>
            <button onclick="updateChart(11)"
                class="bg-[#68422d] text-white py-2 px-4 rounded hover:bg-opacity-90">Desember</button>
        </div>

        <!-- Footer Section -->
        <footer class="bg-white rounded-lg shadow p-6">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Informasi</th>
                        <th class="border px-4 py-2">Detail</th>
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
        </footer>
    </div>

    <script>
    const data = {
        "Januari": Array.from({
            length: 31
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "Februari": Array.from({
            length: 28
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "Maret": Array.from({
            length: 31
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "April": Array.from({
            length: 30
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "Mei": Array.from({
            length: 31
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "Juni": Array.from({
            length: 30
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "Juli": Array.from({
            length: 31
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "Agustus": Array.from({
            length: 31
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "September": Array.from({
            length: 30
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "Oktober": Array.from({
            length: 31
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "November": Array.from({
            length: 30
        }, (_, i) => Math.floor(Math.random() * 50) + 20),
        "Desember": Array.from({
            length: 31
        }, (_, i) => Math.floor(Math.random() * 50) + 20)
    };

    const chart = new Chart(document.getElementById('monthlyChart'), {
        type: 'line',
        data: {
            labels: Array.from({
                length: 31
            }, (_, i) => `Hari ${i + 1}`),
            datasets: [{
                label: 'Kamar Terjual',
                data: data["Januari"],
                borderColor: '#68422d',
                backgroundColor: 'rgba(104, 66, 45, 0.2)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        maxRotation: 90,
                        minRotation: 45
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function updateChart(monthIndex) {
        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ];
        const selectedMonth = months[monthIndex];

        chart.data.labels = Array.from({
            length: data[selectedMonth].length
        }, (_, i) => `Hari ${i + 1}`);
        chart.data.datasets[0].data = data[selectedMonth];
        chart.update();
    }
    </script>
</body>

</html>