<?php require "./views/Components/Head.php" ?>
<body class="h-screen font-Roboto-normal overflow-x-hidden">
    <?php require "./views/Components/NavBar.php" ?>
    <main class="w-[90%] mx-auto h-fit mt-5">
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Paket 1 Bulan -->
            <div class="border rounded-lg p-4 shadow-md hover:shadow-lg transition">
                <h3 class="text-lg font-semibold">Paket 1 Bulan</h3>
                <p class="text-gray-600">Promosikan kost Anda selama 1 bulan penuh.</p>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Pilih Paket</button>
            </div>

            <!-- Paket 3 Bulan -->
            <div class="border rounded-lg p-4 shadow-md hover:shadow-lg transition">
                <h3 class="text-lg font-semibold">Paket 3 Bulan</h3>
                <p class="text-gray-600">Promosikan kost Anda selama 3 bulan penuh dengan harga lebih hemat.</p>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Pilih Paket</button>
            </div>

            <!-- Paket 6 Bulan -->
            <div class="border rounded-lg p-4 shadow-md hover:shadow-lg transition">
                <h3 class="text-lg font-semibold">Paket 6 Bulan</h3>
                <p class="text-gray-600">Promosikan kost Anda selama 6 bulan penuh untuk jangkauan lebih luas.</p>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Pilih Paket</button>
            </div>

            <!-- Paket 1 Tahun -->
            <div class="border rounded-lg p-4 shadow-md hover:shadow-lg transition">
                <h3 class="text-lg font-semibold">Paket 1 Tahun</h3>
                <p class="text-gray-600">Promosikan kost Anda selama 1 tahun penuh dengan paket terbaik.</p>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Pilih Paket</button>
            </div>

            <!-- Paket Custom -->
            <div class="border rounded-lg p-4 shadow-md hover:shadow-lg transition">
                <h3 class="text-lg font-semibold">Paket Kustom</h3>
                <p class="text-gray-600">Tentukan durasi promosi Anda sendiri jika lebih dari 1 tahun.</p>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Pilih Paket</button>
            </div>
        </section>
    </main>
</body>
<?php require "./views/Components/Foot.php" ?>