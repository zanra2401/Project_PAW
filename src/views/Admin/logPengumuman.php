<?php require "./views/Components/Head.php" ?>

<body class="h-screen flex overflow-hidden">
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    <?php require "./views/Components/sidebarAdmin.php"  ?>
    <main class="p-5 w-full min-h-screen flex flex-col gap-3">
        <?php var_dump($data['active-sub-menu']) ?>
        <!-- LOKASI -->
        <span class="mb-3 inline-block text-gray-500"> <i class="fas fa-microphone"></i> Pengumuman <i class="fas fa-chevron-right"></i> <i class="fas fa-sticky-note"></i> Log <i class="fas fa-chevron-right"></i></span>
        <div class="space-y-3 ">
            <div class="h-fit w-full flex gap-2 items-center p-1 rounded-sm border-2 border-gray-500 shaodwmdm shadow-gray-700">
                <i class="fas fa-search text-gray-500"></i>
                <input type="text" placeholder="Cari Pengumuman" class="w-full focus:outline-none font-medium">
            </div>

            <div class="border-b-2 space-x-3 border-gray-500 font-Roboto-medium">
                <a href="/<?= PROJECT_NAME ?>/admin/logpengumuman/semua" class="hover:cursor-pointer h-full px-2 py-1 <?= ($data['active-sub-menu'] == 'semua') ? 'text-white  rounded-sm bg-warna-second' : '' ?>">
                    Semua
                </a>
                <a href="/<?= PROJECT_NAME ?>/admin/logpengumuman/pencari" class="hover:cursor-pointer h-full px-2 py-1 <?= ($data['active-sub-menu'] == 'pencari') ? 'text-white  rounded-sm bg-warna-second' : '' ?>">
                    Pencari Kost
                </a>
                <a href="/<?= PROJECT_NAME ?>/admin/logpengumuman/pemilik" class="hover:cursor-pointer h-full px-2 py-1 <?= ($data['active-sub-menu'] == 'pemilik') ? 'text-white  rounded-sm bg-warna-second' : '' ?>">
                    Pemilik Kost
                </a>
            </div>
        </div>
        <div class="h-full space-y-8 overflow-y-scroll">
            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 text-gray-700 bg-white font-Roboto-bold border-2 border-gray-300 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-300 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-warna-third"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-500">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-500">01:00 PM</span>
                </div>
            </div>
            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 text-gray-700 bg-white font-Roboto-bold border-2 border-gray-300 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-300 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-warna-third"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-500">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-500">01:00 PM</span>
                </div>
            </div>
            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 text-gray-700 bg-white font-Roboto-bold border-2 border-gray-300 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-300 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-warna-third"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-500">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-500">01:00 PM</span>
                </div>
            </div>

            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 text-gray-700 bg-white font-Roboto-bold border-2 border-gray-300 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-300 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-warna-third"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-500">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-500">01:00 PM</span>
                </div>
            </div>

            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 text-gray-700 bg-white font-Roboto-bold border-2 border-gray-300 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-300 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-warna-third"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-500">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-500">01:00 PM</span>
                </div>
            </div>
        </div>
    </main>
</body>
<?php require "./views/Components/Foot.php" ?>