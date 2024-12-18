<?php require './views/Components/Head.php' ?>
<body class="min-h-screen flex">
<style>
    .action-center {
        text-align: center; /* Untuk memusatkan secara horizontal */
        vertical-align: middle; /* Untuk memusatkan secara vertikal */
    }

    /* CSS untuk tombol coklat */
    .btn-brown {
        background-color: #8B4513; /* Warna coklat */
        color: white; /* Warna teks putih */
        padding: 8px 12px; /* Padding untuk ukuran tombol */
        border-radius: 8px; /* Border melengkung */
        text-align: center;
        font-size: 14px; /* Ukuran teks */
        cursor: pointer;
        transition: background-color 0.3s; /* Efek transisi */
    }

    .btn-brown:hover {
        background-color: #A0522D; /* Warna coklat lebih terang saat hover */
    }
</style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
    <?php require "./views/Components/sidebarAdmin.php" ?>
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
    <span class="mb-3 text-gray-600 p-5"><i class="fas fa-newspaper"></i></i> Berita <i class="fas fa-chevron-right"></i> </span>

        <div>
            <div class="p-5 flex justify-between items-center">
                <h2 class="text-xl font-bold p-5">Daftar Berita</h2>
                <!-- Tombol Tambah Berita -->
                <a href="tambahBerita" class="btn-brown">
                    Tambah Berita
                </a>
            </div>
        </div>

        <div class="p-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Judul Berita</th>
                    <th scope="col" class="px-6 py-3">Deskripsi Berita</th>
                    <th scope="col" class="px-6 py-3">Tanggal Dipublish</th>
                    <th scope="col" class="px-6 py-3 action-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data['berita'] as $berita): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $berita['judul_berita']; ?>
                </th>
                <td class="px-6 py-4"><?php echo $berita['deskripsi_berita']; ?></td>
                    <td class="px-6 py-4 text-xs">
                    <?php echo date('d F Y', strtotime($berita['tanggal_dipublish_berita'])); ?>
                </td>
                <td class="action-center">
                    <form action="/<?= PROJECT_NAME ?>/Admin/editberita" method="POST">
                        <input type="hidden" name="idBerita" value="<?= $berita['id_berita'] ?>">
                        <!-- Tombol Edit Berita -->
                        <button type="submit" class="btn-brown">
                            Edit
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
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
