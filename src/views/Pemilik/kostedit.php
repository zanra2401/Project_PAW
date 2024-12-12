<?php require './views/Components/Head.php' ?>
    <body class="overflow-hidden">
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

        <?php require "./views/Components/NavBar.php" ?>
        <main class="overflow-scroll w-screen h-screen pb-10">

            <div class="w-[90%] mx-auto mt-5 pb-10">
    
                    <div id="gambar" class=" grid grid-cols-3 gap-2 relative rounded-lg overflow-hidden">
                        <img class="row-span-2 h-full object-cover col-span-2" src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/bgiItzhw-360x480.jpg" alt="">
                        <img src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/bfZo3SiF-360x480.jpg" alt="">
                        <img src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/d58w8U84-360x480.jpg" alt="">
                        <button id="edit-gambar-kost" onclick="showGambarInputEdit()" class="absolute right-2 shadow bg-warna-second shadow-gray-800 bottom-2 hover:bg-base-color py-2 font-bold text-white rounded-md px-4">
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
                                        NAMA KOST
                                    </h1>   
                                </div>
                                <div class="">
                                    <p class="inline-block">
                                        Jawa Timur, Bojonegoro
                                    </p>
                                </div>
                                <div class="">
                                    <p class="inline-block">
                                        Sisa Kamar 1
                                    </p>
                                </div>
                            </span>
                            
                            <div class="font-Roboto-bold flex flex-col justify-center">
                                <button  class="ml-auto shadow bg-warna-second shadow-gray-800 bottom-2 hover:bg-base-color py-1 font-bold text-white rounded-md px-2">
                                    <i class="fas fa-pencil"></i>
                                </button>
                                <p class="text-2xl text-gray-800">
                                    Rp.  <?= number_format(20000000, 2, ",", ".") ?> / Bulan
                                </p>
                            </div>
    
                        </div>
    
                        <div class="py-4 border-t-2 w-full col-span-2">
                            <h1>Fasilitas</h1>
                            <div class="flex flex-wrap py-2 gap-5 text-1xl w-full items-center">
                                <span>
                                    <i class="fas fa-wifi"></i>
                                    <p class="inline-block">Wifi</p>
                                </span>
                                <span>
                                    <i class="fas fa-kitchen-set"></i>
                                    <p class="inline-block">Dapur</p>
                                </span>
                                <span>
                                    <i class="fas fa-square-parking"></i>
                                    <p class="inline-block">Tempat Parkit</p>
                                </span>
                                <span>
                                    <i class="fas fa-thermometer-quarter"></i>
                                    <p class="inline-block">Air Conditioner</p>
                                </span>
                                <button id="edit-fasilitas" class="inline-block right-2 shadow bg-warna-second shadow-gray-800 bottom-2 hover:bg-base-color py-1 font-bold text-white rounded-md px-2">
                                    <i class="fas fa-pencil"></i>
                                </button>   
    
                                <div class="tooltip absolute z-50" id="edit-fasilitas-tooltip">
                                    Edit Fasilitas
                                    <div class="arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
    
                        <div class="py-4 border-t-2">
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
                        </div>
    
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

            <!-- MODAL  -->
    
            <div id="map-edit-modal" class="z-10 absolute bg- w-screen h-screen -top-100 flex shadow-md shadow-gray-700 bg-gray-700 bg-opacity-50 items-center justify-center">
                <button onclick="hideMapEdit()" class="absolute top-5 right-5">
                    <i class="fas fa-close text-3xl text-red-800"></i>
                </button>
                <div class="modal-container flex flex-col w-2/3 gap-3 rounded-md bg-white h-fit p-3">
                    <div class="h-fit w-full flex gap-2 pl-3 items-center p-1 rounded-md border-2 border-gray-400 shaodwmdm shadow-gray-700">
                        <i class="fas fa-search text-gray-500"></i>
                        <input id="nama-lokasi-map" type="text" placeholder="Cari Lokasi Kost Anda" class="w-full focus:outline-none font-medium" >
                        <button id="cari-lokasi-map" class="px-3 py-1 bg-warna-second text-white font-Roboto-bold rounded-md">cari</button>
                    </div> 
                    <div class="flex gap-3"> 
                        <div class="h-[400px] w-2/3">
                            <div id="map-set" class='h-full rounded-md'></div>
                        </div>
                        <div class="flex flex-col w-1/3">
                            <span class="text-gray-500">
                                <p id="lat-set">lat: </p>
                                <p id="long-set">long: </p>
                            </span>
                            <form action="" class="w-full p-2 mt-auto">
                                <input type="text" name="lat-input" id="lat-input" hidden>
                                <input type="text" name="long-input" id="long-input" hidden>
                                <button class="w-full p-2 tex-white font-Roboto-bold text-xl text-white rounded-md bg-warna-second mt-auto">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="gambar-edit" class="z-10 absolute -top-50 w-screen h-screen flex shadow-md shadow-gray-700 bg-gray-700 bg-opacity-50 items-center justify-center">
                <button onclick="hideGambarInputEdit()"  class="absolute top-5 right-5">
                    <i class="fas fa-close text-3xl text-red-800"></i>
                </button>

                <div class="modal-container flex items-center  h-[90%] overflow-scroll overflow-x-hidden rounded-md bg-white aspect-square">
                    <div class="tooltip z-10 absolute" id="button-add-image-from-modal-tooltip">
                        Tambah Gambar
                        <div class="arrow" data-popper-arrow></div>
                    </div>
                    <div id="grid-image" class="grid grid-cols-2 h-fit p-3 w-full gap-3">
                        <button id="button-add-image-from-modal" class="relative aspect-square bg-gray-200 rounded-md  ">
                            <input type="file" id="input-image-kost-edit" class="w-full h-full hover:cursor-pointer opacity-0 top-0 left-0 z-50 absolute">
                            <i class="far fa-plus text-gray-700" style="font-size: 400%;"></i>
                        </button>
                        <img class="aspect-square object-cover rounded-md" src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/bgiItzhw-360x480.jpg" alt="">
                        <img class="aspect-square object-cover rounded-md" src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/bfZo3SiF-360x480.jpg" alt="">
                        <img class="aspect-square object-cover rounded-md" src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/d58w8U84-360x480.jpg" alt="">
                    </div>
                </div>
            </div>
            <div id="base-info-edit" class="absolute w-screen h-screen top-0 left-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                <button onclick="" class="absolute top-5 right-5 focus:outline-none">
                    <i class="fas fa-close text-3xl text-red-800 hover:text-red-600 transition"></i>
                </button>

                <div class="modal-container flex flex-col items-center h-auto max-h-[90%] w-[95%] md:w-[60%] lg:w-[40%] overflow-auto rounded-lg bg-white shadow-lg">
                    <div class="w-full p-6 bg-white rounded-lg">
                        <form action="/update-kost" method="POST" class="space-y-6">
                            <div>
                                <label for="namaKost" class="block text-sm font-medium text-gray-800">Nama Kost</label>
                                <input type="text" id="namaKost" name="nama_kost" placeholder="Masukkan nama kost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="hargaKost" class="block text-sm font-medium text-gray-800">Harga Kost</label>
                                <input type="number" id="hargaKost" name="harga_kost" placeholder="Masukkan harga kost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="provinsiKost" class="block text-sm font-medium text-gray-800">Provinsi Kost</label>
                                <input type="text" id="provinsiKost" name="provinsi_kost" placeholder="Masukkan provinsi kost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="kotaKost" class="block text-sm font-medium text-gray-800">Kota Kost</label>
                                <input type="text" id="kotaKost" name="kota_kost" placeholder="Masukkan kota kost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="sisaKamar" class="block text-sm font-medium text-gray-800">Sisa Kamar</label>
                                <input type="number" id="sisaKamar" name="sisa_kamar" placeholder="Masukkan jumlah sisa kamar" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div class="flex justify-end space-x-4">
                                <button type="submit" class="px-6 py-2 bg-warna-second text-white font-semibold rounded-lg shadow-md hover:bg-base-color transition">Simpan</button>
                                <a href="/" class="px-6 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </main>


        <script type="module" src="<?= JS ?>pemilikjs/editkost.js"></script>


        <script>
            const mapEditModal = document.getElementById("map-edit-modal");
            const gambarEdit = document.getElementById("gambar-edit");

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

            function showMapEdit()
            {
                mapEditModal.classList.remove('-top-50')
                mapEditModal.classList.add('top-0')
            }

            document.getElementById("input-image-kost-edit").addEventListener("change", async () => {
                console.log("A")
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    document.getElementById("grid-image").innerHTML += `<img class=" aspect-square object-cover" src="${e.target.result}"/>`;
                }
                
                await reader.readAsDataURL(document.getElementById("input-image-kost-edit").files[0]);
                document.getElementById("input-image-kost-edit").value = "";
            })

            document.getElementById("input-image-kost-edit").addEventListener("click", () => {
                this.value = "";
                console.log(this.value);
            })

            function hideMapEdit()
            {
                mapEditModal.classList.remove('top-0')
                mapEditModal.classList.add('-top-50')
            }

            function hideGambarInputEdit()
            {
                gambarEdit.classList.remove('top-0');
                gambarEdit.classList.add('-top-50');
            }

            function showGambarInputEdit()
            {
                gambarEdit.classList.remove('-top-50');
                gambarEdit.classList.add('top-0');
            }
        </script>
        </body>
<?php require './views/Components/Foot.php' ?>