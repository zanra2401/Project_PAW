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
    <link rel="stylesheet" href="<?= NODE_MODULES ?>/quill/dist/quill.snow.css">
    <script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>
    <main class="p-5 w-full min-h-screen flex flex-col gap-3">
        <!-- LOKASI -->
        <span class="mb-3 inline-block text-gray-500"> <i class="fas fa-microphone"></i> Pengumuman <i class="fas fa-chevron-right"></i> <i class="fas fa-sticky-note"></i> Log <i class="fas fa-chevron-right"></i></span>
        <div class="space-y-3 ">
            <form action="/<?= PROJECT_NAME ?>/admin/logpengumuman/cari" method="POST" class="h-fit w-full px-4 py-1 flex gap-2 items-center p-1 rounded-sm border-2 border-gray-500 shadow-md shadow-gray-700">
                <i class="fas fa-search text-gray-500"></i>
                <input type="text" name="cari" placeholder="Cari Pengumuman" class="w-full border-none focus:outline-none font-medium">
                <button class="h-full p-3 px-4 text-white rounded-md font-Roboto-bold bg-warna-second">Cari</button>
            </form>

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
            <?php
                $id = 0;
                foreach ($data['pengumuman'] as $pengumuman)
                {
                    $date = new DateTime($pengumuman['data_pengumuman']['tanggal_pengumuman']);
                    echo <<<EOD
                    <div class="mt-5 relative">
                        <span class="absolute px-3 py-1 text-gray-700 bg-white font-Roboto-bold border-2 border-gray-300 rounded-sm -translate-y-1/2">
                            {$date->format("F, j, Y")}
                        </span>
                        <div class="px-2 py-6 gap-3 border-t-2 border-gray-300 flex items-center">
                            <span>
                                <i class="far fa-envelope text-[40px] text-warna-third"></i>
                            </span>
                            <span class="translate-y-1/4">
                                <h3 class="font-Roboto-bold text-gray-500">{$pengumuman['data_pengumuman']['judul_pengumuman']}</h3>
                                <button onclick='detailPengumuman({$id})' class="ml-auto translate-y-1/2 inline-block text-warna-third hover:underline font-Roboto-bold">Detail</button>
                            </span>
                        </div>
                    </div>
                    EOD;
                    $id += 1;
                }
            ?>
        </div>

        <div id="pengumumanDetail" class="absolute z-10 w-screen h-screen -top-full left-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                <button onclick="hideDetailPengumuman()" class="absolute top-5 right-5 focus:outline-none">
                    <i class="fas fa-close text-3xl text-red-800 hover:text-red-600 transition"></i>
                </button>

                <div class="modal-container flex p-2 flex-col items-center h-auto max-h-[90%] w-[95%] md:w-[60%] lg:w-[40%] overflow-auto rounded-lg bg-white shadow-lg">
                    <div class="w-full text-left mb-3"><strong class="w-full text-2xl" id="judulPengumuman"></strong> </div>
                    <div class="w-full text-left mb-3"><strong class="w-full text-gray-700 font-Roboto-medium" id="Pengirim"></strong> </div>

                    <div id="isiPengumuman" class="border-2 p-3 rounded-md border-gray-300 mt-5 text-left w-full">

                    </div>
                </div>
        </div>
    </main>
    <script>
        const pengumuman = <?= json_encode($data['pengumuman']) ?>;
        const editorContainer = document.getElementById("isiPengumuman");
            const options = {
                debug: 'info',
                modules: {
                    toolbar: false,
                },
                theme: 'snow',
                readOnly: true
            };

        const quill = new Quill(editorContainer, options);


        function detailPengumuman(id)
        {
            pengumumanDetail.classList.remove('-top-full');
            pengumumanDetail.classList.add('top-0');

            Pengirim.innerHTML = pengumuman[id]['pengirim']['username_admin'];
            judulPengumuman.innerHTML = pengumuman[id]['data_pengumuman']['judul_pengumuman'];
            quill.root.innerHTML = pengumuman[id]['data_pengumuman']['isi_pengumuman'];
        }
            
        function hideDetailPengumuman()
        {
            pengumumanDetail.classList.remove('top-0');
            pengumumanDetail.classList.add('-top-full');
        }
    </script>
</body>
<?php require "./views/Components/Foot.php" ?>