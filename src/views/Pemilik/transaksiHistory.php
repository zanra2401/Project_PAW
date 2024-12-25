<?php 
    require "./views/Components/Head.php";
    $foto_profile = $data['data_user'][0]['profile_user'];

    
?>
    <body class="h-screen flex font-Roboto-normal overflow-x-hidden ">
        <?php require "./views/Components/sidebarPemilik.php" ?>
        <main class="flex-1 flex flex-col p-5 overflow-y-auto">
            <span class="mb-3 font-Roboto-medium h-10 text-gray-600"> <i class="fas fa-chart-simple"></i> <a href="">Dash Board</a> <i class="fas fa-chevron-right mr-2"></i> <i class="fas fa-money-bill"></i> <a href="">Transaksi History</a> <i class="fas fa-chevron-right"></i> </span>
            <div>
                <form action="/<?= PROJECT_NAME ?>/pemilik/transaksihistory" method="post" class="h-fit mb-3 rounded-md px-3 w-full flex gap-2 items-center p-1 rounded-sm border-2 border-gray-500 shaodwmdm shadow-gray-700">
                    <i class="fas fa-search text-gray-500"></i>
                    <input type="text" name="namaTransaksi" placeholder="Cari ID Transaksi" class="w-full border-none focus:outline-none font-medium">
                    <button class="font-Roboto-bold">Cari</button>
                </div>
                <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-4 py-2 border">User</th>
                        <th class="px-4 py-2 border">ID Transaksi</th>
                        <th class="px-4 py-2 border">Tipe Transaksi</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Harga</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['transaksi'] as $item): ?>
                        <tr class="bg-white border-b">
                            <td class="px-4 py-2"><?php echo $item['username_user']; ?></td>
                            <td class="px-4 py-2"><?php echo $item['id_transaksi']; ?></td>
                            <td class="px-4 py-2"><?php echo ucfirst($item['tipe_transaksi']); ?></td>
                            <td class="px-4 py-2"><?php echo $item['tanggal_dipesan_transaksi']; ?></td>
                            <td class="px-4 py-2">Rp <?php echo number_format($item['harga_transaksi'], 0, ',', '.'); ?></td>
                            <td class="px-4 py-2"><?php echo ucfirst($item['status_transaksi']); ?></td>
                            <td class="px-4 py-2 flex justify-center gap-2">
                                <?php if (strtolower($item['tipe_transaksi']) == 'offline' and strtolower($item['status_transaksi']) != 'settlement'): ?>
                                    <a href="/<?= PROJECT_NAME ?>/pemilik/selesaitransaksi/<?= $item['id_transaksi'] ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Selesai</a>
                                    <a href="/<?= PROJECT_NAME ?>/pemilik/bataltransaksi/<?= $item['id_transaksi'] ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-blue-600">Batal</a>
                                <?php else: ?>
                                    <span class="text-gray-500">N/A</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </main>
    </body>

    <script>
        const filterModal = document.getElementById("filterModal");
        function showFilterModal()
        {
            filterModal.classList.toggle("hidden");
        }

        function hideFilterModal()
        {
            filterModal.classList.toggle("hidden");
        }
    </script>
<?php require "./views/Components/Foot.php" ?>