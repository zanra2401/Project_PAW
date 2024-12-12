<?php require './views/Components/HeadHomepage.php' ?>
<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css">

    <?php require "./views/Components/NavBar.php" ?>   
    <script src="<?= JS ?>/libs/jquery.js"></script> 
    <script src="<?= JS ?>/libs/pagination.js"></script>   

    <!-- Breadcrumb Section -->
    <div class="p-2 flex justify-center border-b-2 border-t-2 bg-gray-100">
        <span class="mb-3 w-[90%] inline-block text-gray-500 text-sm"> 
            <i class="fa fa-home"></i> Home 
            <i class="fas fa-chevron-right mx-2"></i> 
            <i class="fa fa-heart"></i> Favorit 
            <i class="fas fa-chevron-right mx-2"></i>
        </span>
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
        const data = Array.from({ length: 50 }, (_, i) => `
            <div class="bg-white border rounded-lg shadow-lg overflow-hidden">
                <a href="#" class="group block">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden bg-gray-200">
                        <img src="https://images.rukita.co/buildings/building/_HAN5555.jpg?tr=c-at_max%2Cw-3840" alt="Kost Putri" class="h-full w-full object-cover group-hover:opacity-75">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center">
                            <p class="text-sm font-medium bg-gray-100 border rounded-lg px-3 py-1">Putri</p>
                            <p class="ml-4 text-sm italic text-red-500">Sisa 1 kamar</p>
                            <div class="flex items-center ml-auto">
                                <i class="fa fa-heart text-red-500"></i>
                                <p class="pl-2 text-sm text-gray-700 cursor-pointer">Hapus</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600">Keputran, Tegalsari</p>
                        <p class="mt-2 text-lg font-semibold text-gray-900">Rp 450.000 / Bulan</p>
                    </div>
                </a>
            </div>
        `);

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
