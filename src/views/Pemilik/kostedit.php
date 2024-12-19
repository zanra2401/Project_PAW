<?php require './views/Components/Head.php' ?>
    <body class="overflow-hidden flex">
        <style>
            /* For most browsers */
            .hide-scrollbar {
                scrollbar-width: none; /* Firefox */
                -ms-overflow-style: none; /* Internet Explorer 10+ */
            }

            .hide-scrollbar::-webkit-scrollbar {
                display: none; /* Safari and Chrome */
            }

            .tooltip {
                /* ... */
                display: none;
            }

            .tooltip[data-show] {
                display: block;
            }
        </style>
        <script src="<?= NODE_MODULES ?>leaflet/dist/leaflet.js"></script>
        <link rel="stylesheet" href="<?= NODE_MODULES ?>leaflet/dist/leaflet.css">
     
        <?php require "./views/Components/sidebarPemilik.php" ?>
        <main class="overflow-scroll w-screen h-screen pb-10">

        <?php
            if (isset($_SESSION['berhasil-update']))
            {
                $hellper->flashSuccess("berhasil edit kost", $_SESSION['berhasil-update']);
                unset($_SESSION['berhasil-update']);
            }
            
            if (isset($_SESSION['gagal-update'])) {
                $hellper->flashAlert("gagal edit kost", $_SESSION['gagal-update']);
                unset($_SESSION['gagal-update']);

            }
            ?>
            <div class="w-[90%] mx-auto mt-5 pb-10">
                <span class="mb-3 font-Roboto-medium h-10 s text-gray-600"> <i class="fas fa-hotel"></i> <a href="">Kost</a> <i class="fas fa-chevron-right mr-2"></i> <i class="fas fa-pencil"></i> <a href="">Edit Kost</a> <i class="fas fa-chevron-right"></i> </span>

                    <div id="gambar" class="h-[500px] mt-3 grid grid-cols-3 grid-rows-2 gap-1 relative rounded-lg overflow-hidden">
                        <div class="row-span-2 h-full  col-span-2">
                            <img class="w-full object-center object-cover" src="<?= "/" . PROJECT_NAME . "/" . $data['kost']['gambar'][0]['path_gambar'] ?>" alt="">
                        </div>
                        <div class="overflow-hidden">
                            <img class="object-cover h-full" src="<?= "/" . PROJECT_NAME . "/" . $data['kost']['gambar'][1]['path_gambar'] ?>" alt="">
                        </div>
                        <div class="overflow-hidden">
                            <img class="object-cover h-full" src="<?= "/" . PROJECT_NAME . "/" . $data['kost']['gambar'][2]['path_gambar'] ?>" alt="">
                        </div>
                        <button id="edit-gambar-kost" onclick="showGambarInputEdit()" class="absolute aspect-square right-2 shadow bg-warna-second shadow-gray-800 bottom-2 hover:bg-base-color py-2 font-bold text-white rounded-md px-4">
                            <i class="fas fa-pencil"></i>
                        </button>
                    </div>
                    <div class="tooltip" id="edit-gambar-kost-tooltip">
                        Edit Gambar Kost
                        <div class="arrow" data-popper-arrow></div>
                    </div>
    
                    <div class="grid grid-cols-2 grid-rows-[100px_auto_auto] w-full mt-4">
    
                        <div class="flex justify-between items-center py-4 col-span-2">
    
                            <span class="flex flex-col">
                                <div class="flex items-center text-gray-800">
                                    <h1 class="inline-block font-bold font-Roboto-bold text-2xl">
                                        <?= $data['kost']['data_kost']['nama_kost'] ?>
                                    </h1>   
                                </div>
                                <div class="">
                                    <p id="alamat" class="inline-block">
                                    </p>
                                </div>
                                <div class="">
                                    <p class="inline-block">
                                        Sisa Kamar <?= $data['kost']['data_kost']['sisa_kamar'] ?>
                                    </p>
                                </div>
                            </span>
                            
                            <div class="font-Roboto-bold flex flex-col justify-center">
                                <button onclick="showBaseInfoEdit()"  class="ml-auto shadow bg-warna-second shadow-gray-800 bottom-2 hover:bg-base-color py-1 font-bold text-white rounded-md px-2">
                                    <i class="fas fa-pencil"></i>
                                </button>
                                <p class="text-2xl text-gray-800">
                                    Rp.  <?= number_format($data['kost']['data_kost']['harga_kost'], 2, ",", ".") ?> / Bulan
                                </p>
                            </div>
    
                        </div>
    
                            <div class="py-4 border-t-2 w-full col-span-2">
                                <h1 class="text-2xl font-bold mb-6 inline-block">Fasilitas</h1>  
                                <button onclick="showFasilitasEdit()" class="inline-block aspect-square  ml-3 font-bold text-white rounded-md ">
                                    <i class="fas fa-pencil text-warna-second"></i>
                                </button>
                                
                                <!-- Fasilitas Kamar -->
                                <div class="mb-6">
                                    <h2 class="text-xl font-semibold flex items-center mb-2">
                                        <i class="fas fa-bed text-blue-500 mr-2"></i> Fasilitas Kamar
                                    </h2>
                                    <ul class="list-none space-y-2 pl-5">
                                    <?php
                                        foreach ($data['fasilitas_kamar_info'] as $fb)
                                        {
                                            echo <<<EOD
                                             <li class="flex items-center">
                                                <i class="fas fa-check-circle text-green-500 mr-2"></i> {$fb['nama_fasilitas']}
                                            </li>
                                            EOD;;
                                        }
                                    ?>
                                    </ul>
                                </div>

                                <!-- Fasilitas Bersama -->
                                <div>
                                    <h2 class="text-xl font-semibold flex items-center mb-2">
                                        <i class="fas fa-users text-blue-500 mr-2"></i> Fasilitas Bersama
                                    </h2>
                                    <ul class="list-none space-y-2 pl-5">
                                    <?php
                                        foreach ($data['fasilitas_bersama_info'] as $fb)
                                        {
                                            echo <<<EOD
                                             <li class="flex items-center">
                                                <i class="fas fa-check-circle text-green-500 mr-2"></i> {$fb['nama_fasilitas']}
                                            </li>
                                            EOD;;
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                      
    
                        <!-- <div class="py-4 border-t-2">
                            <div class="relative overflow-hidden h-fit">
                                <button data-lokasi="lantai-1" onclick="show(event)" class="hover:cursor-pointer w-full text-left">
                                    <i data-lokasi-icon="lantai-1" class="fas fa-chevron-down"></i>
                                    <span>
                                        Lantai 1
                                    </span>
                                    <i class="fas fa-pencil text-warna-second"></i>
                                </button>
    
                                <div data-lokasi-kamar="lantai-1" class="flex py-3 px-1 flex-wrap gap-3 -translate-y-[120%] absolute">
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        Kamar 02
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow bg-warna-second text-white font-bold hover:text-white shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                </div>
                            </div>
                             
                            <div class="relative overflow-hidden h-fit">
                                <button data-lokasi="lantai-2" onclick="show(event)"  class="hover:cursor-pointer w-full text-left">
                                    <i data-lokasi-icon="lantai-2" class="fas fa-chevron-down"></i>
                                    <span>
                                        Lantai 2
                                    </span>
                                    <i class="fas fa-pencil text-warna-second"></i>
                                </button>
    
                                <div data-lokasi-kamar="lantai-2" class="flex py-3 flex-wrap gap-3 -translate-y-[120%] absolute">
                                    <div class="shadow font-bold hover:text-white text-gray-800 shadow-gray-400 rounded-sm px-4 py-3 hover:cursor-pointer hover:bg-warna-second">
                                        01
                                    </div>
                                </div>
                            </div>
                        </div> -->
    
                        <div class="relative h-fit py-4 border-t-2"">
                            <h1>Lokasi</h1>
                            <div id="map" style="height: 400px; width: 100%;" class="relative z-10">
                            </div>
    
                            <button onclick="showMapEdit()" id="edit-lokasi" class="absolute inline-block z-50 right-2 shadow bg-warna-second shadow-gray-800 bottom-10 hover:bg-base-color py-1 font-bold text-white rounded-md px-2">
                                    <i class="fas fa-pencil"></i>
                            </button>   
    
                            <div class="tooltip" id="edit-lokasi-kost-tooltip">
                                Edit Lokasi Kost
                                <div class="arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
            </div>

            
            
            
            
        </main>
        <!-- MODAL  -->

        <div id="map-edit-modal" class="z-10 absolute bg- w-screen h-screen -top-full flex bg-gray-700 bg-opacity-50 items-center justify-center">
                <button onclick="hideMapEdit()" class="absolute top-5 right-5">
                    <i class="fas fa-close text-3xl text-red-800"></i>
                </button>
                <div class="modal-container flex flex-col w-2/3 gap-3 rounded-md bg-white h-fit p-3">
                    <div class="h-fit w-full flex gap-2 pl-3 items-center p-1 rounded-md border-2 border-gray-400 shaodwmdm shadow-gray-700">
                        <i class="fas fa-search text-gray-500"></i>
                        <input id="nama-lokasi-map" type="text" placeholder="Cari Lokasi Kost Anda" class="w-full border-none focus:outline-none font-medium" >
                        <button id="cari-lokasi-map" class="px-3 py-1 bg-warna-second text-white font-Roboto-bold rounded-md">cari</button>
                    </div> 
                    <div class="flex gap-3"> 
                        <div class="h-[400px] w-2/3">
                            <div id="map-set" class='h-full rounded-md'></div>
                        </div>
                        <div class="flex flex-col w-1/3">
                            <span class="text-gray-500">
                                <p id="lat-set">lat: <?= $data['kost']['data_kost']['lat'] ?> </p>
                                <p id="long-set">long: <?= $data['kost']['data_kost']['lng'] ?> </p>
                            </span>
                            <form action="/<?= PROJECT_NAME ?>/pemilik/updatelatlong" method="POST" class="w-full p-2 mt-auto">
                                <input type="text" name="lat" id="lat-input" hidden>
                                <input type="text" name="long" id="long-input" hidden>
                                <input type="text" name="id_kost" value="<?= $data['kost']['data_kost']['id_kost'] ?>" hidden>
                                <button class="w-full p-2 tex-white font-Roboto-bold text-xl text-white rounded-md bg-warna-second mt-auto">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fasilitas-edit-modal" class="z-10 absolute bg- w-screen h-screen -top-full flex bg-gray-700 bg-opacity-50 items-center justify-center">
                <button onclick="hideFasilitasEdit()" class="absolute top-5 right-5">
                    <i class="fas fa-close text-3xl text-red-800"></i>
                </button>
                <div class="modal-container flex flex-col w-2/3 gap-3 rounded-md bg-white h-fit p-3">
                    <h2 class="font-Roboto-medium">Fasilitas Kamar</h2>
                    <ul id="FasilitasKamar" class="px-6">
                    <?php
                        foreach ($data['fasilitas_kamar_info'] as $fb)
                        {
                            echo <<<EOD
                                 <li data-id="{$fb['id_fasilitas']}" class='list-item list-disc'>
                                    <span>
                                        {$fb['nama_fasilitas']}
                                    </span>
                                    <button onclick="hapusFasilitasFDB(event)">
                                        <i class="fas fa-trash w-full h-full p-2 aspect-square text-rose-700"></i>
                                    </button>
                                </li>
                            EOD;;
                        }
                    ?>
                    </ul>
                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-sink text-gray-700"></i>
                        <select id="fasilitasKamar"  class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                            <option value="" disabled selected>Pilih Fasilitas Kamar di Kost anda</option>

                            <?php
                                foreach ($data['fasilitas_kamar'] as $fk)
                                {
                                    echo "<option value='{$fk['id_fasilitas']}'>{$fk['nama_fasilitas']}</option>";
                                }
                            ?>
                        </select>
                    </div>


                    <h2 class="font-Roboto-medium">Fasilitas Bersama</h2>
                    <ul id="FasilitasBersama" class="px-6">
                    <?php
                        foreach ($data['fasilitas_bersama_info'] as $fb)
                        {
                            echo <<<EOD
                                 <li data-id="{$fb['id_fasilitas']}" class='list-item list-disc'>
                                    <span>
                                        {$fb['nama_fasilitas']}
                                    </span>
                                    <button onclick="hapusFasilitasFDB(event)">
                                        <i class="fas fa-trash w-full h-full p-2 aspect-square text-rose-700"></i>
                                    </button>
                                </li>
                            EOD;;
                        }
                    ?>
                    </ul>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-bed text-gray-700"></i>
                        <select id="fasilitasBersama"  class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                            <option value="" disabled selected>Pilih Fasilitas Bersama di Kost anda</option>

                            <?php
                                foreach ($data['fasilitas_bersama'] as $fb)
                                {
                                    echo "<option value='{$fb['id_fasilitas']}'>{$fb['nama_fasilitas']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <form class="w-full" action="/<?= PROJECT_NAME ?>/pemilik/updatefasilitas" method="post">
                        <input type="text" name="fasilitas" id="fasilitasInput" hidden>
                        <input type="text" name="fasilitasDel" id="fasilitasDelete" hidden>
                        <input type="text" name="id_kost" value="<?= $data['kost']['data_kost']['id_kost'] ?>" hidden>

                        <button onclick="updateFasilitas()" class="px-6 py-2 w-full bg-red-500 text-white font-semibold  rounded-lg shadow-md hover:bg-base-color transition">Simpan</button>
                    </form>
                </div>
            </div>

            <div id="gambar-edit" class="z-10 absolute -top-full w-screen h-screen flex 0 py-5 bg-gray-700 bg-opacity-50 items-center justify-center">
                <button onclick="hideGambarInputEdit()"  class="absolute top-5 right-5">
                    <i class="fas fa-close text-3xl text-red-800"></i>
                </button>

                <div class="modal-container flex-col relative flex items-center justify-center  h-[90%] overflow-x-hidden rounded-md bg-white aspect-square">
                    <div class="tooltip z-10 absolute" id="button-add-image-from-modal-tooltip">
                        Tambah Gambar
                        <div class="arrow" data-popper-arrow></div>
                    </div>
                    <div id="gambar-preview" class="grid grid-cols-2 h-full overflow-auto p-3 w-full gap-3">
                        
                    </div>
                    <button onclick="updateGambar()" class="w-[90%] my-5 py-3 bg-warna-second text-white font-Roboto-bold rounded-md">Simpan</button>
                </div>
            </div>

            <div id="base-info-edit" class="absolute z-10 w-screen h-screen -top-full left-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                <button onclick="hideBaseInfoEdit()" class="absolute top-5 right-5 focus:outline-none">
                    <i class="fas fa-close text-3xl text-red-800 hover:text-red-600 transition"></i>
                </button>

                <div class="modal-container flex flex-col items-center h-auto max-h-[90%] w-[95%] md:w-[60%] lg:w-[40%] overflow-auto rounded-lg bg-white shadow-lg">
                    <div class="w-full p-6 bg-white rounded-lg">
                        <form action="/<?= PROJECT_NAME ?>/pemilik/updatebaseinfo" method="POST" class="space-y-6">
                            <div>
                                <label for="namaKost" class="block text-sm font-medium text-gray-800">Nama Kost</label>
                                <input type="text" id="namaKost" name="nama" placeholder="Masukkan nama kost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="<?= $data['kost']['data_kost']['nama_kost'] ?>">
                            </div>
                            <div>
                                <label for="hargaKost" class="block text-sm font-medium text-gray-800">Harga Kost</label>
                                <input type="number" id="hargaKost" name="harga" placeholder="Masukkan harga kost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="<?= $data['kost']['data_kost']['harga_kost'] ?>">
                            </div>
                            <div>
                                <label for="provinsiKost" class="block text-sm font-medium text-gray-800">Provinsi Kost</label>
                                <select type="text" id="provinsiKost" name="provinsi" placeholder="Masukkan provinsi kost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="<?= $data['kost']['data_kost']['provinsi_kost'] ?>">
                                
                                </select>
                            </div>
                            <div>
                                <label for="kotaKost" class="block text-sm font-medium text-gray-800">Kota Kost</label>
                                <select id="kotaKost" name="kota" placeholder="Masukkan kota kost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="<?= $data['kost']['data_kost']['kota_kost'] ?>">
                                </select>
                            </div>
                            <div>
                                <label for="sisaKamar" class="block text-sm font-medium text-gray-800" ">Sisa Kamar</label>
                                <input type="number" id="sisaKamar" name="sisa_kamar" value="<?= $data['kost']['data_kost']['sisa_kamar'] ?>" placeholder="Masukkan jumlah sisa kamar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="sisaKamar" class="block text-sm font-medium text-gray-800">Sisa Kamar</label>
                                <select name="tipe" id="tipeKost" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option <?= ($data['kost']['data_kost']['tipe_kost'] == 'putri' ) ? 'selected' : '' ?> value="putri">Putri</option>
                                    <option <?= ($data['kost']['data_kost']['tipe_kost'] == 'putra' ) ? 'selected' : '' ?> value="putra">Putra</option>
                                </select>
                            </div>
                            <input type="text" name="id_kost" value="<?= $data['kost']['data_kost']['id_kost'] ?>" hidden>
                            <div class="flex justify-end space-x-4">
                                <button type="submit" class="px-6 py-2 bg-red-500 text-white font-semibold  rounded-lg shadow-md hover:bg-base-color transition">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <script type="module" src="<?= JS ?>pemilikjs/editkost.js"></script>


        <script>
            const mapEditModal = document.getElementById("map-edit-modal");
            const gambarEdit = document.getElementById("gambar-edit");
            const baseInfoEdit = document.getElementById("base-info-edit");
            const fasilitasEditModal = document.getElementById("fasilitas-edit-modal");
            const gambarPreview = document.getElementById("gambar-preview");

            var gambar = `
            <button id="button-add-image-from-modal" type="button" onchange="tambahFoto(event)" class="w-full relative aspect-square rounded-lg bg-gray-200">
                <i class="fas fa-plus text-gray-700 text-[300%]"></i>
                <input id type="file" class="w-full  absolute left-0 top-0 h-full opacity-0" multiple>
            </button>
            <?php
                foreach ($data['kost']['gambar'] as $g) 
                {
                    echo <<<EOD
                        <div class="relative">
                            <button type="button" onclick="gambarDelete({$g['id_gambar_kost']})" class="absolute top-1 rounded-md overflow-hidden right-0 aspect-square z-30">
                                <i class="fas fa-trash p-2 w-full h-full z-10 text-white"></i>
                            </button>
                            <img class="rounded-lg aspect-square object-cover" src="
                    EOD;

                    echo '/' . PROJECT_NAME . '/' . $g['path_gambar'] . '"/></div>';
                }
            ?>
            `;

            gambarPreview.innerHTML = gambar;
            
            var id = 0;

            function readFileAsync(file) {
                return new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        resolve(e.target.result);  // Return the result when the file is read
                    };
                    reader.onerror = reject;  // Reject the promise if there's an error
                    reader.readAsDataURL(file);  // Start reading the file
            });}

            var gambarUp = {};
            var gambarDel = {};

            function deleteFoto(event)
            {
                const id = event.target.dataset.id;
                delete gambarUp[parseInt(id)];
                event.target.parentNode.parentNode.remove();
            }

            function gambarDelete(id)
            {
                gambarDel[id] = id;
                event.target.parentNode.parentNode.remove();
                console.log(gambarDel);
            }


            async function tambahFoto(event) {
                for (let i = 0; i < event.target.files.length; i++) {
                    gambarUp[id] = event.target.files[i];

                    const result = await readFileAsync(event.target.files[i]);

                    gambarPreview.innerHTML += `
                        <div class="relative">
                            <button type="button" data-id=${id} onclick="deleteFoto(event)" class="absolute top-1 rounded-md overflow-hidden right-0 aspect-square">
                                <i data-id=${id} class="fas p-2 w-full h-full z-10 text-white fa-trash"></i>
                            </button>
                            <img class="rounded-lg aspect-square object-cover" src="${result}" />
                        </div>
                    `;
                    id += 1;
                }

                console.log(gambarUp)
            }

            function show(event) 
            {
                const kamar = document.querySelector(`[data-lokasi-kamar='${event.currentTarget.getAttribute('data-lokasi')}']`);
                const icon = document.querySelector(`[data-lokasi-icon='${event.currentTarget.getAttribute('data-lokasi')}']`);
                if (kamar.classList.contains("absolute") && kamar.classList.contains("-translate-y-[120%]")) {
                    kamar.classList.remove("absolute");
                    kamar.classList.remove("-translate-y-[120%]");
                    icon.classList.remove("fa-chevron-down");
                    icon.classList.add("fa-chevron-up");
                } else { 
                    kamar.classList.add("absolute");
                    kamar.classList.add("-translate-y-[120%]");
                    icon.classList.remove("fa-chevron-up");
                    icon.classList.add("fa-chevron-down");
                }
            }

            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
            .then(response => response.json())
            .then(provinces => {
                provinces.forEach(element => {
                    provinsiKost.innerHTML += `<option value="${element['id']}">${element['name']}</option>`;
                    if (element['id'] == <?= $data['kost']['data_kost']['provinsi_kost'] ?>) {
                        alamat.innerHTML += `${element['name']}, `;
                        provinsiKost.selectedIndex = element['id'];
                        provinsiKost.value = element['id'];
                        return;
                    }
                });
            });

            const map = L.map('map').setView([<?= $data['kost']['data_kost']['lat'] ?>, <?= $data['kost']['data_kost']['lng'] ?>], 10); // Jakarta

            
            const markerLayer = L.layerGroup().addTo(map);

            const alidade = 'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png';
            const openstreetmap = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const stadiamaps = 'https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png';

            L.tileLayer(stadiamaps, {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker([<?= $data['kost']['data_kost']['lat'] ?>, <?= $data['kost']['data_kost']['lng'] ?>]).addTo(markerLayer);






            // Map SET

            const namaLokasiMap = document.getElementById("nama-lokasi-map");
            const cariLokasiMap = document.getElementById("cari-lokasi-map")
            const mapSet = L.map('map-set').setView([20, 20], 5);
            const latSet = document.getElementById('lat-set');
            const longSet = document.getElementById('long-set');
            const latInput = document.getElementById('lat-input');
            const longInput = document.getElementById('long-input');
           
            const markerLayerMapSet = L.layerGroup().addTo(mapSet);

            L.tileLayer(stadiamaps, {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(mapSet);

            L.marker([20, 20]).addTo(markerLayerMapSet);

            mapSet.on('click', (e) => {
                mapSet.setView([e.latlng.lat, e.latlng.lng],e.target._zoom);
                markerLayerMapSet.clearLayers();
                L.marker([e.latlng.lat, e.latlng.lng]).addTo(markerLayerMapSet);
                latSet.innerHTML = `lat: ${e.latlng.lat}`;
                longSet.innerHTML = `long: ${e.latlng.lng}`;
                latInput.value = e.latlng.lat;
                longInput.value = e.latlng.lng;
            });

            cariLokasiMap.addEventListener('click', async (e) => {
                const url = `https://nominatim.openstreetmap.org/search?q=${namaLokasiMap.value}&format=json&addressdetails=1`;
                

                await fetch(url).then(async (result) => {
                    await result.json().then((r) => {
                        mapSet.setView([r[0].lat, r[0].lon], 15);
                        markerLayerMapSet.clearLayers();
                        L.marker([r[0].lat, r[0].lon]).addTo(markerLayerMapSet)
                        latInput.value = r[0].lat;
                        longInput.value =r[0].lon;
                    })
                });

                
            })
        
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/<?= $data['kost']['data_kost']['provinsi_kost'] ?>.json`)
                .then(response => response.json())
                .then(kotas => {
                    kotas.forEach(element => {
                        kotaKost.innerHTML += `<option value="${element['id']}">${element['name']}</option>`; 
                        if (element['id'] == <?= $data['kost']['data_kost']['kota_kost'] ?>) {
                            alamat.innerHTML += `${element['name']}`;
                            kotaKost.value = element['id'];

                            kotaKost.selectedIndex = element['id'];
                            return;
                        }
                    })
                });

            function showMapEdit()
            {
                mapEditModal.classList.remove('-top-full')
                mapEditModal.classList.add('top-0')
            }


            document.getElementById("gambar-preview").addEventListener("click", () => {
                this.value = "";
                console.log(this.value);
            })

            function hideMapEdit()
            {
                mapEditModal.classList.remove('top-0')
                mapEditModal.classList.add('-top-full')
            }

            function hideGambarInputEdit()
            {
                gambarEdit.classList.remove('top-0');
                gambarEdit.classList.add('-top-full');
                gambarDel = {};
                gambarPreview.innerHTML = gambar;
            }

            function showGambarInputEdit()
            {
                gambarEdit.classList.remove('-top-full');
                gambarEdit.classList.add('top-0');
            }

            function showBaseInfoEdit()
            {
                baseInfoEdit.classList.remove('-top-full');
                baseInfoEdit.classList.add('top-0');
            }
            
            function hideBaseInfoEdit()
            {
                baseInfoEdit.classList.remove('top-0');
                baseInfoEdit.classList.add('-top-full');
            }

            function showFasilitasEdit()
            {
                fasilitasEditModal.classList.remove('-top-full');
                fasilitasEditModal.classList.add('top-0');
            }
            
            function hideFasilitasEdit()
            {
                fasilitasEditModal.classList.remove('top-0');
                fasilitasEditModal.classList.add('-top-full');
                window.location.reload();
            }


            async function updateGambar() {
                const form = document.createElement("form");
                form.method = "POST";
                form.action = "/<?= PROJECT_NAME ?>/pemilik/updategambar";
                form.enctype = "multipart/form-data"; // Untuk upload file


                form.appendChild(buatInputTersembunyi("id_del", JSON.stringify(gambarDel)));
                form.appendChild(buatInputTersembunyi("id_kost",<?= $data['kost']['data_kost']['id_kost'] ?>));

                Object.keys(gambarUp).forEach((id) => {
                    const fileInput = document.createElement("input");
                    fileInput.type = "file";
                    fileInput.hidden = "true";
                    fileInput.name = `gambar[${id}]`; // Mengatur nama file agar bisa diakses dengan array di PHP
                    fileInput.multiple = true;
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(gambarUp[id]);
                    fileInput.files = dataTransfer.files;
                    form.appendChild(fileInput);
                });

                document.body.appendChild(form);
                form.submit();
            }

            function buatInputTersembunyi(name, value) {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = name;
                input.value = value;
                return input;
            }


            fasilitas = {
                'kamar': {

                },
                'bersama': {
                }
            }

            fasilitas_ada = {
                'kamar': [
                    <?php
                        foreach ($data['fasilitas_kamar_info'] as $fb)
                        {
                            echo $fb['id_fasilitas'] . ",";
                        }
                    ?>
                ],
                'bersama': [
                    <?php
                        foreach ($data['fasilitas_bersama_info'] as $fb)
                        {
                            echo $fb['id_fasilitas'] . ",";
                        }
                    ?>
                ]
            }

            
            fasilitasDel = {};
            
            function updateFasilitas()
            {
                fasilitasInput.value = JSON.stringify(fasilitas);
                fasilitasDelete.value = JSON.stringify(fasilitasDel);
            }
            function hapusFasilitasFDB(event)
            {
                fasilitasDel[event.target.parentNode.parentNode.dataset.id] = event.target.parentNode.parentNode.dataset.id;
                event.target.parentNode.parentNode.remove();
            }

            
            function hapusFasilitasBersama(event)
            {
                delete fasilitas['bersama'][event.target.parentNode.parentNode.dataset.id];
                event.target.parentNode.parentNode.remove();
                console.log(fasilitas); 
            }

            
            function hapusFasilitasKamar(event)
            {
                delete fasilitas['kamar'][event.target.parentNode.parentNode.dataset.id];
                event.target.parentNode.parentNode.remove();
            }

            
            fasilitasKamar.addEventListener("change", () => {
                if (fasilitasKamar.value in fasilitas['kamar'] || (fasilitas_ada['kamar'].includes(parseInt(fasilitasKamar.value)) && !(fasilitasKamar.value in fasilitasDel)))
                {
                    return;   
                }


                FasilitasKamar.innerHTML += `
                <li data-id="${fasilitasKamar.value}" class='list-item list-disc'>
                    <span>
                        ${fasilitasKamar[fasilitasKamar.selectedIndex].innerHTML}
                    </span>
                    <button onclick="hapusFasilitasKamar(event)">
                        <i class="fas fa-trash w-full h-full p-2 aspect-square text-rose-700"></i>
                    </button>
                </li>`;
                fasilitas['kamar'][fasilitasKamar.value] = fasilitasKamar[fasilitasKamar.selectedIndex].innerHTML;
                console.log(fasilitas)
            });

            fasilitasBersama.addEventListener("change", () => {
                if (fasilitasKamar.value in fasilitas['bersama'] || (fasilitas_ada['bersama'].includes(parseInt(fasilitasBersama.value)) && !(fasilitasKamar.value in fasilitasDel)))
                {
                    return;   
                }


                FasilitasBersama.innerHTML += `
                <li data-id="${fasilitasBersama.value}" class='list-item list-disc'>
                    <span>
                        ${fasilitasBersama[fasilitasBersama.selectedIndex].innerHTML}
                    </span>
                    <button onclick="hapusFasilitasBersama(event)">
                        <i class="fas fa-trash w-full h-full p-2 aspect-square text-rose-700"></i>
                    </button>
                </li>`;
                fasilitas['bersama'][fasilitasBersama.value] = fasilitasBersama[fasilitasBersama.selectedIndex].innerHTML;
            });

        </script>
        </body>
<?php require './views/Components/Foot.php' ?>