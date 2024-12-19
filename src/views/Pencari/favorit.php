<?php require './views/Components/HeadHomepage.php' ?>
<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css">

    <?php require "./views/Components/NavBar.php" ?>   
    <script src="<?= JS ?>/libs/jquery.js"></script> 
    <script src="<?= JS ?>/libs/pagination.js"></script>   

    <!-- Breadcrumb Section -->
    <div class="w-[90%] mx-auto pt-4 h-16 items-center">
        <div class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                <a href="/project_paw/pencari/homepage" class="inline-flex items-center text-lg font-medium text-gray-700  hover:text-[#83493d] dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Home
                </a>
                </li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-4 h-4 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Favorit</span>
                </div>
                </li>
            </ol>
        </div>
    </div>

    <!-- Main Content -->
    <main class="w-[90%] mx-auto min-h-screen bg-gray-50 flex flex-col">
        <!-- Header Section -->
        <div class="flex justify-center items-center py-6">
            <h1 class="font-bold text-2xl text-gray-800">Difavoritkan</h1>
        </div>

        <!-- Grid Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-6" id="test">
            <!-- Konten akan dirender di sini -->
        </div>

        <!-- Pagination Section -->
        <div id="kost" class="flex justify-center items-center my-6"></div>
    </main>

    <script>
        // Data dummy
        const kosts = <?= json_encode($data['kosts']) ?>;
       
        const data = kosts.map((item) =>  {
        return `
        <div class="bg-white border rounded-lg shadow-lg overflow-hidden">
            <a href="#" class="group block">
                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden bg-gray-200">
                    <img src="https://images.rukita.co/buildings/building/_HAN5555.jpg?tr=c-at_max%2Cw-3840" alt="Kost Putri" class="h-full w-full object-cover group-hover:opacity-75">
                </div>
                <div class="p-4">
                    <div class="flex items-center">
                        <p class="text-sm font-medium bg-white border rounded-lg px-3 shadow-gray-200 shadow-sm p-2">${item['tipe_kost']}</p>
                        <p class="ml-4 text-sm italic text-red-500">sisa</p>
                        <div class="flex items-center ml-auto">
                            <i class="fa fa-heart text-red-500"></i>
                            <form action="/<?= PROJECT_NAME ?>/Pencari/hapusFavorit" method="POST">
                                <input type="hidden" name="idUser" value"${item['id_user']}">
                                <input type="hidden" name="idKost" value="${item['id_kost']}">
                                <button type="submit" class="pl-2 text-sm text-gray-700 cursor-pointer">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <h1 class="font-bold px-3">${item['nama_kost']}</h1>
                    <p class="text-sm text-gray-600 px-3">${item['lokasi_spesifik_kost']}</p>
                    <p class="mt-2 text-lg font-semibold text-gray-900 px-3"> ${item['harga_kost'].toLocaleString('id-ID', {style: 'currency',currency: 'IDR',minimumFractionDigits: 0})}
                </div>
            </a>
        </div>
    `});

console.log(data); // Data sekarang berupa array dari string HTML


        console.log(data)

        // Inisialisasi Pagination.js
        $('#kost').pagination({
            dataSource: data,
            pageSize: 8, // Jumlah item per halaman
            callback: function (data, pagination) {
                const html = data.map(item => `<div>${item}</div>`).join('');
                $('#test').html(html);
            }
        });
    </script>

    <?php require './views/Components/FooterHomepage.php' ?>
</body>
