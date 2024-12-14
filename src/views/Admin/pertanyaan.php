<?php require './views/Components/Head.php'; ?>
<body class="h-screen flex">
    <?php require './views/Components/sidebarAdmin.php'; ?>    
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
    <span class="mb-3 text-gray-600 p-5"><i class="fas fa-question"></i></i> Pertanyaan <i class="fas fa-chevron-right"></i> </span>
        <div class="relative overflow-x-auto">
            <div class="flex items-center">
                <h1 class="font-Roboto-bold text-2xl p-5">Pertanyaan</h1>
            </div>

            <div class="p-5 items-center gap-2 grid grid-cols-2 grid-rows-2">
                <div>
                    <h1 class="text-md font-medium pb-2">Kategori:</h1>
                </div>
                <div>
                    <div class="h-7 ml-auto p-3 flex items-center gap-2 mr-4 w-48 border">
                        <i class="fas fa-search text-gray-500"></i>
                        <input id="searchInput" type="text" class="focus:outline-none w-40" placeholder="Cari" oninput="filterHandler()">
                    </div>
                </div>
                <div>
                <select id="categoryFilter" class="border p-2 rounded-sm" onchange="filterHandler()">
                    <option value="">Semua Kategori</option>
                    <option value="Akun">Akun</option>
                    <option value="Pembayaran">Pembayaran</option>
                    <option value="Umum">Umum</option>
                </select>
                </div>
            </div>

            <table id="questionsTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                            <a href="balaspertanyaan"
                                class="bg-warna-second text-white px-3 py-1 rounded hover:bg-base-color">Balas</a>
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
                            <a href="balaspertanyaan"
                                class="bg-warna-second text-white px-3 py-1 rounded hover:bg-base-color">Balas</a>
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
                            <a href="balaspertanyaan"
                                class="bg-warna-second text-white px-3 py-1 rounded hover:bg-base-color">Balas</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        function filterHandler() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const categoryFilter = document.getElementById('categoryFilter').value;

            const table = document.getElementById('questionsTable');
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const username = row.cells[0].textContent.toLowerCase();
                const question = row.cells[1].textContent.toLowerCase();
                const category = row.cells[2].textContent;

                const matchesSearch = username.includes(searchInput) || question.includes(searchInput);
                const matchesCategory = categoryFilter === "" || category === categoryFilter;

                if (matchesSearch && matchesCategory) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</body>
<?php require './views/Components/Foot.php'; ?>