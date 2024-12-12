<?php require './views/Components/HeadHomepage.php' ?>
<body>
    <?php require "./views/Components/NavBar.php" ?>    
    <div class="absolute top-0 left-0 h-3/4 bg-[#d7dbdd] rounded-b-[50px] -z-10 overflow-y-hidden"  style="width: 100%;"></div>

    <div class="w-[90%] rounded-3xl mt-[50px] mx-auto">
        <h1 class="text-center text-xl font-bold px-4">Sekarang Cari Kost Bisa Sambil Rebahan</h1>
        <p class="mt-4 text-center sm:text-bold px-4">
            Bingung Mau Cari Kost Dimana? Disini Aja! Cari kost jadi lebih mudah, cepat, dan hemat waktu.
        </p>
        <div class="flex bg-white mx-auto rounded-full mt-[20px] justify-center items-center search-bar" style="height: 70px; width: 70%; gap:10px;">
            <div class="relative w-1/2 field-inputan-search">
                <input type="text" placeholder="Cari sesuatu..." class="w-full p-3 pl-10 border border-gray-300 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-black focus:border-black">
                <i class="fas fa-location-dot absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div>
            <div class="relative piihan-menu">
                <button class="inline-flex justify-center w-full p-3 pl-10 pr-8 border border-gray-300 bg-white rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" aria-expanded="false" aria-haspopup="true" id="menu-button">
                    Pilih Tipe
                    <i class="fas fa-house absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <i class="fas fa-caret-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </button>

                <div class="dropdown-menu absolute hidden bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-2 w-48 rounded-2xl z-10" aria-labelledby="menu-button">
                    <div class="py-1">
                        <div class="relative">
                            <a href="#" class="text-gray-700 block pl-10 p-3 text-sm">Kost Pria</a>
                            <i class="fas w-20 fa-person absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        </div>
                        
                        <div class="relative">
                            <a href="#" class="text-gray-700 block pl-10 p-3 text-sm">Kost Wanita</a>
                            <i class="fas w-20 fa-person-dress absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <button type="submit" name="ubah" class="inline-flex justify-center w-full p-3 pl-10 pr-8 borde rounded-full shadow-md tombol-search" style="background-color: #83493d; color:#fff;">
                    <span class="temukan-kost">Temukan Kost</span>
                </button>
                <i class="fas w-20 fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-white cursor-pointer logo-search"></i>
            </div>
            <div class="relative logo-menu">
                <button class="w-full p-3 rounded-full"><i class="fas fa-sliders top-1/2 transform text-gray-500 "></i></button>
            </div>
        </div>
        
    </div>
    
    <div class="bg-white w-[90%] rounded-3xl mx-auto shadow-lg" style="margin-top:30px;">
        <div class="mx-auto max-w-2xl p-8 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <a href="/project_paw/pencari/kostPage" class="group">
                    <div class="carousel">
                        <div class="carousel-track-container">
                            <ul class="carousel-track">
                                <li class="carousel-slide current-slide">
                                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Image 1">
                                </li>
                                <li class="carousel-slide">
                                    <img src="https://images.rukita.co/buildings/building/391a32e0-f8d.jpg?tr=c-at_max%2Cw-3840" alt="Image 2">
                                </li>
                                <li class="carousel-slide">
                                    <img src="https://images.rukita.co/buildings/building/cfa6edfc-86e.jpg?tr=c-at_max%2Cw-3840" alt="Image 3">
                                </li>
                            </ul>
                        </div>

                        <button type="button" class="carousel-button left-button" data-carousel-prev>
                            <span class="carousel-prev-icon">
                                <svg class="carousel-icon-svg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                            </span>
                        </button>

                        <button type="button" class="carousel-button right-button" data-carousel-next>
                            <span class="carousel-next-icon">
                                <svg class="carousel-icon-svg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>

                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putra</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 2 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Griya kost Umi Sri</h2>
                    <p>Telang Indah, Kamal</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 100.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/_HAN5555.jpg?tr=c-at_max%2Cw-3840" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 1 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">kost Kartika</h2>
                    <p>Keputran, Tegalsari</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 450.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/5abc4fa6-8bb.jpg?tr=c-at_max%2Cw-3840" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 7 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Afreta Kost</h2>
                    <p>Airlangga, Gubeng</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 250.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/73c91959-e49.jpg?tr=c-at_max%2Cw-3840" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 5 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Ay_Ney Kost</h2>
                    <p>Keputih, Sukolilo</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 120.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putra</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 2 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Griya kost Umi Sri</h2>
                    <p>Telang Indah, Kamal</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 100.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/_HAN5555.jpg?tr=c-at_max%2Cw-3840" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 1 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">kost Kartika</h2>
                    <p>Keputran, Tegalsari</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 450.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/5abc4fa6-8bb.jpg?tr=c-at_max%2Cw-3840" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 7 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Afreta Kost</h2>
                    <p>Airlangga, Gubeng</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 250.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/73c91959-e49.jpg?tr=c-at_max%2Cw-3840" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 5 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Ay_Ney Kost</h2>
                    <p>Keputih, Sukolilo</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 120.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putra</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 2 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Griya kost Umi Sri</h2>
                    <p>Telang Indah, Kamal</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 100.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/_HAN5555.jpg?tr=c-at_max%2Cw-3840" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 1 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">kost Kartika</h2>
                    <p>Keputran, Tegalsari</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 450.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/5abc4fa6-8bb.jpg?tr=c-at_max%2Cw-3840" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 7 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Afreta Kost</h2>
                    <p>Airlangga, Gubeng</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 250.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/73c91959-e49.jpg?tr=c-at_max%2Cw-3840" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 5 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Ay_Ney Kost</h2>
                    <p>Keputih, Sukolilo</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 120.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putra</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 2 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Griya kost Umi Sri</h2>
                    <p>Telang Indah, Kamal</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 100.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/_HAN5555.jpg?tr=c-at_max%2Cw-3840" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 1 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">kost Kartika</h2>
                    <p>Keputran, Tegalsari</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 450.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/5abc4fa6-8bb.jpg?tr=c-at_max%2Cw-3840" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 7 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Afreta Kost</h2>
                    <p>Airlangga, Gubeng</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 250.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/73c91959-e49.jpg?tr=c-at_max%2Cw-3840" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 5 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Ay_Ney Kost</h2>
                    <p>Keputih, Sukolilo</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 120.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/_HAN5555.jpg?tr=c-at_max%2Cw-3840" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 1 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">kost Kartika</h2>
                    <p>Keputran, Tegalsari</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 450.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/5abc4fa6-8bb.jpg?tr=c-at_max%2Cw-3840" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 7 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Afreta Kost</h2>
                    <p>Airlangga, Gubeng</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 250.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/73c91959-e49.jpg?tr=c-at_max%2Cw-3840" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 5 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Ay_Ney Kost</h2>
                    <p>Keputih, Sukolilo</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 120.000 / Bulan</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/73c91959-e49.jpg?tr=c-at_max%2Cw-3840" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>

                    <div class="flex items-center mt-2">
                        <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">Putri</p>
                        <p style="margin-left:10px; font-style:italic; color:red;">Sisa 5 kamar</p>
                    </div>
                    <h2 class="mt-4 text-sm text-black font-bold">Ay_Ney Kost</h2>
                    <p>Keputih, Sukolilo</p>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 120.000 / Bulan</p>
                </a>
            </div>
        </div>
    </div>

    <?php require './views/Components/FooterHomepage.php' ?>
    <script>
        
        const button = document.getElementById('menu-button');
        const menu = document.querySelector('.dropdown-menu');

        button.addEventListener('click', () => {
            event.stopPropagation(); 
            menu.classList.toggle('hidden');
        });

        window.addEventListener('click', () => {
            menu.classList.add('hidden');
        })

        const track = document.querySelector('.carousel-track');
        const slides = Array.from(track.children);
        const nextButton = document.querySelector('.right-button');
        const prevButton = document.querySelector('.left-button');

        const slideWidth = slides[0].getBoundingClientRect().width;

        // Atur posisi setiap slide berdampingan
        slides.forEach((slide, index) => {
            slide.style.left = `${slideWidth * index}px`;
        });

        const updateButtons = (currentIndex) => {
            // Sembunyikan tombol `prev` jika di slide pertama
            if (currentIndex === 0) {
                prevButton.classList.add('hidden');
            } else {
                prevButton.classList.remove('hidden');
            }

            // Sembunyikan tombol `next` jika di slide terakhir
            if (currentIndex === slides.length - 1) {
                nextButton.classList.add('hidden');
            } else {
                nextButton.classList.remove('hidden');
            }
        };

        const moveToSlide = (track, currentSlide, targetSlide) => {
            track.style.transform = `translateX(-${targetSlide.style.left})`;
            currentSlide.classList.remove('current-slide');
            targetSlide.classList.add('current-slide');

            const targetIndex = slides.findIndex(slide => slide === targetSlide);
            updateButtons(targetIndex);
        };

        // Awalnya, tombol prev disembunyikan (karena di slide pertama)
        updateButtons(0);

        // Tambahkan event listener pada tombol
        prevButton.addEventListener('click', (e) => {
            e.preventDefault();
            const currentSlide = track.querySelector('.current-slide');
            const prevSlide = currentSlide.previousElementSibling;
            if (prevSlide) moveToSlide(track, currentSlide, prevSlide);
        });

        nextButton.addEventListener('click', (e) => {
            e.preventDefault();
            const currentSlide = track.querySelector('.current-slide');
            const nextSlide = currentSlide.nextElementSibling;
            if (nextSlide) moveToSlide(track, currentSlide, nextSlide);
        });
    </script>
</body>
