<?php require './views/Components/Head.php'; ?>

<body class="h-screen flex">
    <script src="<?= JS ?>/libs/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css">
    <?php require "./views/Components/sidebarAdmin.php"; ?>

    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
        <div class="w-full space-y-3 h-screen overflow-y-scroll p-5">
            <div class="grid grid-cols-2 grid-rows-2 gap-3 gap-y-5 w-full h-fit">
                <!-- Total Transaksi Card -->
                <div class="bg-white rounded-lg shadow-sm shadow-gray-500 p-5 h-96">
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Total Transaksi</h2>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-500 mb-2">Total Transaksi</p>
                        <h1 class="text-4xl font-bold mb-6"><?= $data['totalTransaksi'] ?></h1>

                        <div class="bg-gray-100 rounded-lg overflow-hidden">
                            <div class="grid grid-cols-2">
                                <div class="text-center py-3 border-r border-gray-200">
                                    <p class="text-sm font-medium text-green-600">Transaksi Berhasil</p>
                                    <h2 class="text-4xl font-bold text-green-700 mt-2"><?= $data['transaksiBerhasil'] ?></h2>
                                </div>
                                <div class="text-center py-3">
                                    <p class="text-sm font-medium text-red-600">Transaksi Gagal</p>
                                    <h2 class="text-4xl font-bold text-red-700 mt-2"><?= $data['transaksiGagal'] ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pengguna Aktif Card -->
                <div class="bg-white rounded-lg shadow-gray-500 shadow-sm p-5 h-96">
                    <p class="text-gray-500 mb-2">Total Pengguna Aktif</p>
                    <h1 class="text-4xl font-bold mb-4"><?= $data['jumlahUser']; ?></h1>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3">Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody id="userTable">
                                <?php foreach ($data['user'] as $user): ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $user['username_user']; ?>
                                    </th>
                                    <td class="px-6 py-4"><?= $user['tanggal_akun_dibuat_user']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="pagination" class="flex justify-center mt-4"></div>
                </div>

                <!-- History Transaksi Card -->
                <div class="bg-white col-span-2 rounded-lg shadow-sm pb-4 shadow-gray-500">
                    <div class="flex items-center p-5">
                        <h1 class="font-Roboto-bold">History Transaksi</h1>
                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3">Nominal</th>
                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Metode</th>
                                </tr>
                            </thead>
                            <tbody id="transaksiTableBody">
                                <!-- Data akan diisi oleh JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div id="transaksiPagination" class="flex justify-center mt-4"></div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Data dari server
        const users = <?= json_encode($data['user']); ?>;
        const transaksi = <?= json_encode($data['transaksi']); ?>;

        const rowsPerPage = 3; // Pengguna per halaman
        const transaksiPerPage = 5; // Transaksi per halaman

        // Fungsi untuk merender data pengguna
        function renderTablePage(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedUsers = users.slice(start, end);

            const tableBody = document.getElementById('userTable');
            tableBody.innerHTML = ''; // Clear the table body

            paginatedUsers.forEach(user => {
                const row = document.createElement('tr');
                row.className = "bg-white border-b dark:bg-gray-800 dark:border-gray-700";
                row.innerHTML = `
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${user['username_user']}</th>
                    <td class="px-6 py-4">${user['tanggal_akun_dibuat_user']}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Fungsi untuk merender data transaksi
        function renderTransaksiPage(page) {
            const start = (page - 1) * transaksiPerPage;
            const end = start + transaksiPerPage;
            const paginatedTransaksi = transaksi.slice(start, end);

            const transaksiTableBody = document.querySelector('#transaksiTableBody');
            transaksiTableBody.innerHTML = ''; // Clear the table body

            paginatedTransaksi.forEach(item => {
                const row = document.createElement('tr');
                row.className = "bg-white border-b dark:bg-gray-800 dark:border-gray-700";
                row.innerHTML = `
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item['username_user']}</th>
                    <td class="px-6 py-4">${item['harga_transaksi']}</td>
                    <td class="px-6 py-4">${item['tanggal_dipesan_transaksi']}</td>
                    <td class="px-6 py-4">${item['status_transaksi']}</td>
                    <td class="px-6 py-4">${item['tipe_transaksi']}</td>
                `;
                transaksiTableBody.appendChild(row);
            });
        }

        // Inisialisasi paginasi untuk pengguna
        $('#pagination').pagination({
            dataSource: users,
            pageSize: rowsPerPage,
            callback: function(data, pagination) {
                renderTablePage(pagination.pageNumber);
            }
        });

        // Inisialisasi paginasi untuk transaksi
        $('#transaksiPagination').pagination({
            dataSource: transaksi,
            pageSize: transaksiPerPage,
            callback: function(data, pagination) {
                renderTransaksiPage(pagination.pageNumber);
            }
        });

        // Render halaman pertama untuk pengguna dan transaksi
        renderTablePage(1);
        renderTransaksiPage(1);
    </script>
</body>

<?php require './views/Components/Foot.php'; ?>
