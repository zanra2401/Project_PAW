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

    <div id="box" class="hidden box-exit fixed top-0 right-0 w-[30%] h-full bg-white text-black shadow-lg" style="z-index: 9999;">
        <div class="flex items-center justify-between p-6">
            <h2 class="font-semibold text-3xl">Chats</h2>
            <button class="text-gray-700 hover:opacity-70" id="close_chat" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="w-full h-2 border-b shadow-lg"></div>
        <div id="contact-sidebar" class=" bg-white h-full  border-r flex flex-col items-center border-gray-200 overflow-y-auto">

            <!-- Contact List -->
            <div id="contact-list" class="p-2 w-[99%] ">    
                <!-- Repeat for more contacts -->
                <?php
                    $path = "/" . PROJECT_NAME . "/"; 
                    foreach ($data['contact'] as $contact) {
                        $image_path = $path . $contact[0]['profile_user'];
                        echo <<<EOD
                            <a href="/
                        EOD;
                        
                        echo PROJECT_NAME;

                        echo <<<EOD
                        /pencari/chatting/{$contact[0]['id_user']}" class="flex relative items-center group space-x-3 rounded-md p-4 hover:bg-gray-100 cursor-pointer border-b  ">
                                <img src="{$image_path}" alt="Profile" class="w-10 h-10 rounded-full">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium ">{$contact[0]['username_user']}</h3>
                                </div>
                        EOD;
                        if ($contact['unread'] > 0)
                        {
                            echo <<<EOD
                                    <span class="flex justify-center items-center right-0 -mt-2 -mr-2 w-5 h-5 bg-warna-second text-white text-xs font-semibold rounded-full">
                                        {$contact['unread']}
                                    </span>
                            EOD;
                        }
                                
                        echo "</a>";
                    }
                ?>
            </div>
        </div>
    </div>

    <script>

        const toggleBoxBtn = document.getElementById("chat_button");
        const box = document.getElementById("box");
        const content = document.getElementById("content");
        const close_chat = document.getElementById('close_chat');

        toggleBoxBtn.addEventListener("click", function() {
            box.classList.remove('hidden');
            box.classList.remove("box-exit");
            box.classList.add("box-enter");
            document.body.classList.add("no-scroll");
        });

        close_chat.addEventListener('click', ()=>{
            box.classList.remove("box-enter");
            box.classList.add("box-exit");
            setTimeout(() => {
                box.classList.add('hidden');
                document.body.classList.remove("no-scroll");
            }, 500);
        })

        // Data dummy
        const kosts = <?= json_encode($data['kosts']) ?>;
        const kostsArray = Object.values(kosts);
        const data = kostsArray.map((item) =>  {
        return `
        <div class="bg-white border rounded-lg shadow-lg overflow-hidden h-full">
            <a href="/project_paw/pencari/kostPage/${item['id_kost']}" class="group block">
                <div class="w-full overflow-hidden bg-gray-200" style="height:185px;">
                    <img src="/<?= PROJECT_NAME ?>${item['path_gambar']}" alt="Kost Putri" class="h-full w-full object-cover group-hover:opacity-75">
                </div>
                <div class="p-4">
                    <div class="flex items-center">
                        <p class="text-sm font-medium bg-white border rounded-lg px-3 shadow-gray-200 shadow-sm p-2">${item['tipe_kost']}</p>
                        <p class="ml-4 text-sm italic text-red-500">Sisa kamar ${item['sisa_kamar']} </p>
                        <div class="flex items-center ml-auto">
                            <i class="fa fa-heart text-red-500"></i>
                            <form action="/<?= PROJECT_NAME ?>/Pencari/hapusFavorit" method="POST">
                                <input type="hidden" name="idUser" value"${item['id_user']}">
                                <input type="hidden" name="idKost" value="${item['id_kost']}">
                                <button type="submit" class="pl-2 text-sm text-gray-700 cursor-pointer">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <h1 class="font-bold py-2">${item['nama_kost']}</h1>
                    <p data-kota="${item['kota_kost']}" data-provinsi="${item['provinsi_kost']}">
                        Loading...
                    </p>
                    <p class="mt-2 text-lg font-semibold text-gray-900"> ${item['harga_kost'].toLocaleString('id-ID', {style: 'currency',currency: 'IDR',minimumFractionDigits: 0})}
                </div>
            </a>
        </div>
    `});


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

        // ambil lokasi

        function capitalizeFirstLetter(input) {
            return input
                .toLowerCase() 
                .split(' ') 
                .map(word => word.charAt(0).toUpperCase() + word.slice(1)) 
                .join(' '); 
        }

        document.addEventListener("DOMContentLoaded", async () => {
            try {
                const elements = document.querySelectorAll('p[data-kota][data-provinsi]');
                const provinces = await fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                    .then(response => response.json());

                elements.forEach(async (element) => {
                    const provinceId = element.getAttribute('data-provinsi');
                    const cityId = element.getAttribute('data-kota');

                    const province = provinces.find(prov => prov.id == provinceId);
                    const provinceName = province ? province.name : 'Provinsi tidak ditemukan';

                    const cities = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                        .then(response => response.json());

                    const city = cities.find(cty => cty.id == cityId);
                    const cityName = city ? city.name : 'Kota tidak ditemukan';

                    element.textContent = `${capitalizeFirstLetter(cityName)}, ${capitalizeFirstLetter(provinceName)}`;
                });
            } catch (error) {
                console.error('Terjadi kesalahan:', error);
            }
        });

    </script>

    <?php require './views/Components/FooterHomepage.php' ?>
</body>
