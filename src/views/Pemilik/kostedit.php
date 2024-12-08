<?php require './views/Components/Head.php' ?>
    <body>
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
        <div class="w-[90%] mx-auto mt-5 pb-10">

                <div id="gambar" class=" grid grid-cols-3 gap-2 relative rounded-lg overflow-hidden">
                    <img class="row-span-2 h-full object-cover col-span-2" src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/bgiItzhw-360x480.jpg" alt="">
                    <img src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/bfZo3SiF-360x480.jpg" alt="">
                    <img src="https://static.mamikos.com/uploads/cache/data/style/2023-05-23/d58w8U84-360x480.jpg" alt="">
                    <button id="edit-gambar-kost" class="absolute right-2 shadow bg-warna-second shadow-gray-800 bottom-2 hover:bg-base-color py-2 font-bold text-white rounded-md px-4">
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

                        <button id="edit-lokasi" class="absolute inline-block z-50 right-2 shadow bg-warna-second shadow-gray-800 bottom-10 hover:bg-base-color py-1 font-bold text-white rounded-md px-2">
                                <i class="fas fa-pencil"></i>
                        </button>   

                        <div class="tooltip" id="edit-lokasi-kost-tooltip">
                            Edit Lokasi Kost
                            <div class="arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>
        </div>



        <script>
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
        </script>



        <script type="module" src="<?= JS ?>pemilikjs/editkost.js"></script>
        </body>
<?php require './views/Components/Foot.php' ?>