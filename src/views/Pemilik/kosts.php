<?php 
    require "./views/Components/Head.php"; 
    
    $foto_profile = $data['data_user'][0]['profile_user'];
?>

    <body class="overflow-hidden min-h-screen flex p-0 m-0">
        <?php require "./views/Components/sidebarPemilik.php" ?>
        <main class="p-5 flex-1 overflow-y-scroll h-screen">
            <form action="/<?= PROJECT_NAME ?>/pemilik/kosts/cari" method="POST" class="h-fit w-full flex gap-2 px-5 items-center p-1 rounded-sm border-2 border-gray-200 shaodwmdm shadow-gray-700">
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
        console.log(kostArray[0]['gambar']);  // Periksa hasil konversi

        const data = kostArray.map((kost) => `
            <div class="aspect-square rounded-lg overflow-hidden flex flex-col">
                <img src="/<?= PROJECT_NAME ?>/${kost.gambar[0].path_gambar}" class="w-full z-10 object-cover aspect-video" alt="">
                <div class="w-full p-2 flex rounded-b-lg flex-col border-2 flex-1 border-gray-300 border-t-0">
                    <h2 class="text-gray-700 font-Roboto-bold">${kost.data_kost.nama_kost}</h2>
                    <a href="/<?= PROJECT_NAME ?>/pemilik/editkost/${kost.data_kost.id_kost}" class="bg-warna-second text-center mt-auto p-1 w-full font-Roboto-bold text-white">Lihat Detail</a>
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