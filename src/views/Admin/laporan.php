<?php require './views/Components/Head.php'; ?>
<body class="h-screen flex">
    <?php require './views/Components/sidebarAdmin.php'; ?>    
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
        <div class="relative overflow-x-auto">
            <div class="flex items-center">
                <h1 class="font-Roboto-bold text-2xl p-5">Laporan</h1>

                <div class="border h-7 ml-auto p-3 flex items-center gap-2 mr-4">
                    <i class="fas fa-search text-gray-500"></i>
                    <input type="text" class="" placeholder="Search">
                </div>
            </div>
            
            <div 
                class="p-5 flex items-center gap-2 cursor-pointer hover:text-blue-500" 
                onclick="filterHandler()">
                <h1 class="text-md font-medium">Filter</h1>
                <i class="fa fa-filter text-gray-600"></i>
            </div>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">Laporan</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Anisa Pratiwi
                        </th>
                        <td class="px-6 py-4">Pemilik kost tidak menanggapi pemesanan selama lebih dari 3 hari.</td>
                        <td class="px-6 py-4">Pengaduan</td>
                        <td class="px-6 py-4">2024-12-01</td>
                        <td class="px-6 py-4">
                            <select class="border rounded px-2 py-1">
                                <option>Belum Diproses</option>
                                <option>Diproses</option>
                                <option>Selesai</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <button 
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
                                onclick="viewDetail('1')">
                                Detail
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Rizky Fadillah
                        </th>
                        <td class="px-6 py-4">Deskripsi fasilitas tidak sesuai dengan kondisi sebenarnya.</td>
                        <td class="px-6 py-4">Verifikasi</td>
                        <td class="px-6 py-4">2024-12-05</td>
                        <td class="px-6 py-4">
                            <select class="border rounded px-2 py-1">
                                <option>Belum Diproses</option>
                                <option>Diproses</option>
                                <option>Selesai</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <button 
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
                                onclick="viewDetail('2')">
                                Detail
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        function viewDetail(reportId) {
            alert("Melihat detail laporan dengan ID: " + reportId);
            // Implementasi diarahkan ke halaman detail laporan
        }
    </script>
</body>
<?php require './views/Components/Foot.php'; ?>
