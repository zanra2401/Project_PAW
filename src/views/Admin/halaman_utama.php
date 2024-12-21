<?php require './views/Components/Head.php' ?>

<body class="h-screen flex">
    <script src="<?= JS ?>/libs/fullcalendar.js"></script>    
    <?php require "./views/Components/sidebarAdmin.php" ?>

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
                        <h1 class="text-4xl font-bold mb-6">100</h1>
                        
                        <div class="bg-gray-100 rounded-lg overflow-hidden">
                            <div class="grid grid-cols-2">
                                <div class="text-center py-3 border-r border-gray-200">
                                    <p class="text-sm font-medium text-green-600">Transaksi Berhasil</p>
                                    <h2 class="text-4xl font-bold text-green-700 mt-2">50</h2>
                                </div>
                                <div class="text-center py-3">
                                    <p class="text-sm font-medium text-red-600">Transaksi Gagal</p>
                                    <h2 class="text-4xl font-bold text-red-700 mt-2">50</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pengguna Aktif Card -->
                <div class="bg-white rounded-lg shadow-gray-500 shadow-sm p-5 h-96">
                    <p class="text-gray-500 mb-2">Total Pengguna Aktif</p>
                    <h1 class="text-4xl font-bold mb-4"><?= $data['jumlahUser'];?></h1>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3">Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody id="userTable">
                                <?php foreach($data['user'] as $user): ?>
                                
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                                    <td class="px-6 py-4"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="pagination" class="flex justify-center mt-4"></div> <!-- Centered pagination buttons -->
                </div>

                <!-- History Transaksi Card -->
                <div class="bg-white col-span-2 rounded-lg shadow-sm shadow-gray-500">
                    <div class="flex items-center p-5">
                        <h1 class="font-Roboto-bold">History Transaksi</h1>
                        <div class="h-7 ml-auto p-2 flex items-center gap-2">
                            <i class="fas fa-search text-gray-500"></i>
                            <input type="text" placeholder="search">
                        </div>
                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3">Nominal</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Metode</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Tuhu Pangestu</th>
                                    <td class="px-6 py-4">Rp 100.000</td>
                                    <td class="px-6 py-4">pending</td>
                                    <td class="px-6 py-4">Qris</td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Danendra Mahardika</th>
                                    <td class="px-6 py-4">Rp 200.000</td>
                                    <td class="px-6 py-4">Sukses</td>
                                    <td class="px-6 py-4">BCA</td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Zanuar Rikza Aditiya</th>
                                    <td class="px-6 py-4">Rp 150.000</td>
                                    <td class="px-6 py-4">Dibatalkan</td>
                                    <td class="px-6 py-4">BNI</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="rounded-lg shadow-sm shadow-gray-500 p-5 h-fit">
                <div class="h-full w-full">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Pagination setup for users
        const users = <?= json_encode($data['user']); ?>;
        const rowsPerPage = 3; // Adjust the number of rows per page as needed

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

        $('#pagination').pagination({
            dataSource: users,
            pageSize: rowsPerPage,
            callback: function(data, pagination) {
                renderTablePage(pagination.pageNumber);
            }
        });

        // Initialize first page
        renderTablePage(1);
    </script>
</body>

<?php require './views/Components/Foot.php' ?>
