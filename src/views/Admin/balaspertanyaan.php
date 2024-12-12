<?php require './views/Components/Head.php'; ?>
<body class="h-screen flex">
    <?php require './views/Components/sidebarAdmin.php'; ?>    
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
        <div class="relative overflow-x-auto">
            <div class="flex items-center">
                <h1 class="font-Roboto-bold text-2xl p-5">Pertanyaan</h1>

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
                        <th scope="col" class="px-6 py-3">Pertanyaan</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Anisa Pratiwi
                        </th>
                        <td class="px-6 py-4">Bagaimana cara mengganti alamat email pada akun saya?</td>
                        <td class="px-6 py-4">Akun</td>
                        <td class="px-6 py-4">2024-12-01</td>
                        <td class="px-6 py-4">
                            <button 
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
                                onclick="replyHandler('Bagaimana cara mengganti alamat email pada akun saya?')">
                                Balas
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Rizky Fadillah
                        </th>
                        <td class="px-6 py-4">Apakah pembayaran saya sudah diverifikasi?</td>
                        <td class="px-6 py-4">Pembayaran</td>
                        <td class="px-6 py-4">2024-12-05</td>
                        <td class="px-6 py-4">
                            <button 
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
                                onclick="replyHandler('Apakah pembayaran saya sudah diverifikasi?')">
                                Balas
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Budi Setiawan
                        </th>
                        <td class="px-6 py-4">Bagaimana cara menghubungi pemilik kost secara langsung?</td>
                        <td class="px-6 py-4">Umum</td>
                        <td class="px-6 py-4">2024-12-08</td>
                        <td class="px-6 py-4">
                            <button 
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
                                onclick="replyHandler('Bagaimana cara menghubungi pemilik kost secara langsung?')">
                                Balas
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        function replyHandler(question) {
            alert("Balas pertanyaan: " + question);
            // Di sini bisa diarahkan ke modal atau halaman lain untuk proses balasan
        }
    </script>
</body>
<?php require './views/Components/Foot.php'; ?>
