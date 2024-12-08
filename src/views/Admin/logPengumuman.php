<?php require "./views/Components/Head.php" ?>
<body class="h-screen flex overflow-hidden font-Roboto-normal">
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
        <span class="mb-3 inline-block text-gray-500"> <i class="fas fa-microphone"></i> Pengumuman <i class="fas fa-chevron-right"></i> <i class="fas fa-sticky-note"></i> Log <i class="fas fa-chevron-right"></i></span>
        <div class="space-y-3">
            <input type="text" placeholder="Cari Pengumuman" p-0 class="w-full font-medium rounded-sm border-2 border-gray-500 focus:outline-none p-1 shaodw-sm shadow-gray-700">
            <div class="border-b-2 space-x-3 border-gray-500 font-Roboto-medium">
                 <span class="hover:cursor-pointer h-full px-2 py-1 <?= ($data['active-menu'] == 'semua') ? 'text-white  rounded-sm bg-gray-900' : '' ?>">
                    Semua
                 </span>
                 <span class="hover:cursor-pointer h-full px-2 py-1 <?= ($data['active-menu'] == 'pencari') ? 'text-white  rounded-sm bg-gray-900' : '' ?>">
                    Pencari Kost
                 </span>
                 <span class="hover:cursor-pointer h-full px-2 py-1 <?= ($data['active-menu'] == 'pemilik') ? 'text-white  rounded-sm bg-gray-900' : '' ?>">
                    Pemilik Kost
                 </span>
            </div>
        </div>
        <div class="h-full space-y-8 overflow-y-scroll">
            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 bg-white font-Roboto-bold border-2 border-gray-500 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-500 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-gray-700"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-700">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-700">01:00 PM</span>
                </div>
            </div>
            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 bg-white font-Roboto-bold border-2 border-gray-500 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-500 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-gray-700"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-700">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-700">01:00 PM</span>
                </div>
            </div>
            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 bg-white font-Roboto-bold border-2 border-gray-500 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-500 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-gray-700"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-700">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-700">01:00 PM</span>
                </div>
            </div>
            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 bg-white font-Roboto-bold border-2 border-gray-500 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-500 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-gray-700"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-700">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-700">01:00 PM</span>
                </div>
            </div>
            <div class="mt-5 relative">
                <span class="absolute px-3 py-1 bg-white font-Roboto-bold border-2 border-gray-500 rounded-sm -translate-y-1/2">
                    Kami, 27 Agustus 2005
                </span>
                <div class="px-2 py-6 gap-3 border-t-2 border-gray-500 flex items-center">
                    <span>
                        <i class="far fa-envelope text-[40px] text-gray-700"></i>
                    </span>
                    <span class="translate-y-1/4">
                        <h3 class="font-Roboto-bold text-gray-700">Pembaruan Baru</h3>
                        <a href="" class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</a>
                    </span>
                    <span class="ml-auto font-Roboto-bold text-gray-700">01:00 PM</span>
                </div>
            </div>
        </div>
    </main>
</body>
<?php require "./views/Components/Foot.php" ?>