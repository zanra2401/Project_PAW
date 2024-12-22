<?php 
    require "./views/Components/Head.php"; 
    
    $foto_profile = $data['data_user'][0]['profile_user'];
?>

    <body class="overflow-hidden min-h-screen flex p-0 m-0">
        <?php require "./views/Components/sidebarPemilik.php" ?>
        <main class="p-5 flex-1 overflow-y-scroll h-screen">
            <span class="mb-3 font-Roboto-medium h-10 s text-gray-600"> <i class="fas fa-hotel"></i> <a href="">Kost</a><i class="fas fa-chevron-right mr-2"></i> </span>

            <form action="/<?= PROJECT_NAME ?>/pemilik/kosts/cari" method="POST" class="h-fit mt-5 w-full flex gap-2 px-5 items-center p-1 rounded-sm border-2 border-gray-200 shaodwmdm shadow-gray-700">
                <i class="fas fa-search text-gray-500"></i>
                <input type="text" id="cariKost" name="cari" placeholder="Cari Kost Anda" class="w-full border-none focus:outline-none font-medium">
                <button class="h-full p-3 px-6 text-white font-Roboto-bold rounded-md bg-warna-second">Cari</button>
            </form>
            <h1 class="mt-4 font-Roboto-bold text-gray-700 mb-5">Kost Milik Anda</h1>
            <div id="kosts"  class="grid grid-cols-4 gap-3 w-full">
                
            </div>
            <div id="paginasi" class="mt-5 hover:cursor-pointer"></div>
        </main>

        <script>
        // Data dummy
        const dataKost = <?= json_encode($data["kosts"]) ?>;
        const kostArray = Object.values(dataKost); // Mengonversi objek menjadi array

        const data = kostArray.map((kost) => `
           <div class=" rounded-lg overflow-hidden flex flex-col shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="relative w-full">
                    <img src="/<?= PROJECT_NAME ?>/${kost.gambar[0].path_gambar}" class="w-full z-10 object-cover aspect-video" alt="Gambar Kost">
                    <div class="absolute top-2 right-2 bg-gray-900 bg-opacity-50 text-white text-xs px-2 py-1 rounded-lg shadow">
                        ${kost.data_kost.sisa_kamar} Kamar Tersedia
                    </div>
                </div>
                <div class="w-full p-4 flex flex-col rounded-b-lg border border-gray-300 bg-white flex-1">
                    <h2 class="text-gray-800 font-bold text-lg mb-2">${kost.data_kost.nama_kost}</h2>
                    <div class="mt-auto flex gap-2 items-center">
                        <a href="/<?= PROJECT_NAME ?>/pemilik/editkost/${kost.data_kost.id_kost}" 
                        class="bg-warna-second text-center py-2 px-4 rounded-md font-bold text-white flex-1 hover:bg-warna-second-dark">
                            Lihat Detail
                        </a>
                        <a href="/<?= PROJECT_NAME ?>/pemilik/review/${kost.data_kost.id_kost}" 
                        class="bg-gray-200 py-2 px-4 rounded-md text-gray-700 hover:bg-gray-300">
                            <i class="fas fa-comment text-lg"></i> <!-- Ikon Font Awesome -->
                        </a>
                    </div>
                </div>
            </div>

        `);

        // Inisialisasi Pagination.js
        $('#paginasi').pagination({
            dataSource: data,
            pageSize: 8, // Jumlah item per halaman
            callback: function (data, pagination) {
                const html = data.map(item => `<div>${item}</div>`).join('');
                $('#kosts').html(html);
            }
        });
    </script>
    </body>
<?php require "./views/Components/Foot.php"; ?>