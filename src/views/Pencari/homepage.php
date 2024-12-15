<?php 
    require './views/Components/HeadHomepage.php'; 

    function formatRupiah($angka) {
        $angka = (float) $angka;
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
    
    $data_profile = $data['profile']['profile_user'];
    
?>
<body>
    <?php require "./views/Components/NavBar.php" ?>  
    <div class="absolute top-0 left-0 h-3/4 bg-[#d7dbdd] rounded-b-[50px] -z-10 overflow-y-hidden"  style="width: 100%;"></div>
    <div class="w-[90%] rounded-3xl mt-[50px] mx-auto">
        <h1 class="text-center text-3xl font-bold px-4" style="color:#83493d;">Sekarang Cari Kost Bisa Sambil Rebahan</h1>
        <p class="mt-4 text-center sm:text-bold px-4">
            Bingung Mau Cari Kost Dimana? Disini Aja! Cari kost jadi lebih mudah, cepat, dan hemat waktu.
        </p>
        <div class="flex bg-white mx-auto rounded-full mt-[20px] justify-center items-center search-bar" style="height: 70px; width: 70%; gap:10px;">
            <div class="relative w-1/2 field-inputan-search">
                <input type="text" placeholder="Cari lokasi atau nama kost.." class="w-full p-3 pl-10 border border-gray-300 rounded-full shadow-md focus:outline-none focus:ring focus:ring-warna-second">
                <i class="fas fa-location-dot absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div>
            <div class="relative piihan-menu">
                <button class="inline-flex justify-center w-full p-3 pl-10 pr-8 border border-gray-300 bg-white rounded-full shadow-md focus:outline-none focus:ring focus:ring-warna-second" aria-expanded="false" aria-haspopup="true" id="tipe-menu-button">
                    Pilih Tipe
                    <i class="fas fa-house absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <i class="fas fa-caret-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </button>

                <div class="dropdown-menu absolute hidden bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-2 w-48 rounded-2xl z-10" aria-labelledby="tipe-menu-button">
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
                <button type="submit" name="ubah" class="inline-flex justify-center w-full p-3 pl-10 pr-8 borde rounded-full shadow-md tombol-search hover:opacity-70" style="background-color: #83493d; color:#fff;">
                    <span class="temukan-kost">Temukan Kost</span>
                </button>
                <i class="fas w-20 fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-white cursor-pointer logo-search"></i>
            </div>
            <div class="relative logo-menu">
                <button class="w-full p-3 rounded-full hover:opacity-70" id="filter_button"><i class="fas fa-sliders top-1/2 transform text-gray-500 "></i></button>
            </div>
        </div>
        
    </div>

    <div id="filter" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded shadow-lg w-1/2 transition-all duration-300 transform scale-0 h-[80%]" id="contain_filter">
            <div class="grid grid-cols-2 p-6">
                <button class="text-gray-700 hover:opacity-70 " id="close_filter">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <p class="text-base-color font-semibold text-2xl">FILTER</p>
            </div>
            <form class="grid">
                <div class="rounded-xl h-[380px] overflow-y-scroll p-6 grid gap-5">
                    <div class="grid gap-5">
                        <p class="block text-gray-600 font-medium mb-2 text-xl">Urutkan</p>
                        <div class="grid gap-3">
                            <label class="flex items-center gap-3">
                                <input type="radio" name="Urutkan" value="Paling populer" class="hidden peer">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-warna-second peer-checked:bg-warna-second transition"></div>
                                <span class="text-gray-700 peer-checked:text-warna-second font-medium">Paling populer</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="radio" name="Urutkan" value="Hunian Terbaru" class="hidden peer">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-warna-second peer-checked:bg-warna-second transition"></div>
                                <span class="text-gray-700 peer-checked:text-warna-second font-medium">Hunian Terbaru</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="radio" name="Urutkan" value="Harga terendah" class="hidden peer">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-warna-second peer-checked:bg-warna-second transition"></div>
                                <span class="text-gray-700 peer-checked:text-warna-second font-medium">Harga terendah</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="radio" name="Urutkan" value="Harga tertinggi" class="hidden peer">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-warna-second peer-checked:bg-warna-second transition"></div>
                                <span class="text-gray-700 peer-checked:text-warna-second font-medium">Harga tertinggi</span>
                            </label>
                        </div>
                    </div>
        
                    <div class="grid gap-5">
                        <label class="block text-gray-600 font-medium mb-2 text-xl">Harga per Bulan</label>
                        <div class="flex space-x-4">
                            <input 
                                type="text" 
                                placeholder="Min"
                                class="w-1/2 border h-14 border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-warna-second"
                                oninput="formatRupiah(this)" />
                            
                            <div class="flex items-center justify-center px-4">-</div>
    
                            <input 
                                type="text" 
                                placeholder="Max"
                                class="w-1/2 border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-warna-second"
                                oninput="formatRupiah(this)" />
                        </div>

                    </div>
                    <div class="grid gap-5">
                        <label class="block text-gray-600 font-medium mb-2 text-xl">Fasilitas bersama</label>
                        <div class="grid grid-cols-2 grid-rows-4 gap-5">
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Internet/Wi-Fi</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Parkir Motor</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Kulkas</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Dapur</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>CCTV</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Ruang tamu</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Mesin cuci</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Dispenser</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid gap-5">
                        <label class="block text-gray-600 font-medium mb-2 text-xl">Fasilitas Kamar</label>
                        <div class="grid gap-5">
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Boleh Membawa Pets</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Pasutri</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Memiliki Jam Malam</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid gap-5">
                        <label class="block text-gray-600 font-medium mb-2 text-xl">Fasilitas Kamar</label>
                        <div class="grid grid-cols-2 grid-rows-4 gap-5">
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Jendela</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>AC</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>TV kabel</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Kursi</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Kasur</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Kamar Mandi Dalam</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Meja</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Lemari</span>
                            </label>
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                                <span>Kipas Angin</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center p-6 border-t border-gray-100">
                    <a href="#" class="font-medium hover:opacity-70">Reset</a>                    
                    <button type="submit"
                        class="w-[130px] text-white py-2 rounded-lg font-medium focus:outline-none focus:ring focus:ring-[#83493d] hover:opacity-70"
                        style="background-color: #83493d;">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="bg-white w-[90%] rounded-3xl mx-auto shadow-lg" style="margin-top:30px;">
        <div class="mx-auto max-w-2xl p-8 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <?php foreach($data['data'] as $kost): ?>
                    <?php 
                        $harga = formatRupiah($kost['data_kost']['harga_kost']);
                        echo <<<EOD
                            <a href="/project_paw/pencari/kostPage/{$kost['data_kost']['id_kost']}" class="group">
                                <div class="carousel">
                                    <div class="carousel-track-container">
                                        <ul class="carousel-track">
                        EOD;
                        foreach ($kost['gambar'] as $gambar)
                        {
                            echo <<<EOD
                                <li class="carousel-slide current-slide">
                                    <img src="{$gambar['path_gambar']}" alt="Image 1">
                                </li>
                            EOD;
                        }
                        
                        echo <<<EOD
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
                                    <p class="border-zinc-950 border rounded-lg shadow-lg" style="padding: 10px; width: 60px;">{$kost['data_kost']['tipe_kost']}</p>
                                    <p style="margin-left:10px; font-style:italic; color:red;">Sisa {$kost['sisa_kamar']} kamar</p>
                                </div>
                                <h2 class="mt-4 text-sm text-black font-bold">{$kost['data_kost']['nama_kost']}</h2>
                                <p>{$kost['data_kost']['kota_kost']}, {$kost['data_kost']['provinsi_kost']}</p>
                                <p class="mt-1 text-lg font-medium text-gray-900">{$harga} / Bulan</p>
                            </a>
                        EOD;
                    ?>
                <?php endforeach; ?>

                <!-- <a href="/project_paw/pencari/kostPage" class="group">
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
                </a> -->
            </div>
        </div>
    </div>
    <?php require './views/Components/FooterHomepage.php' ?>
    <script>
        const filter_button = document.getElementById('filter_button')
        const filter = document.getElementById('filter')
        const close_filter = document.getElementById('close_filter')
        const contain_filter = document.getElementById('contain_filter')

        filter_button.addEventListener('click', ()=>{
            filter.classList.remove('hidden')
            setTimeout(()=>{
                contain_filter.classList.remove('scale-0')
                contain_filter.classList.add('scale-100')
            }, 50)
        })

        close_filter.addEventListener('click', ()=>{
            contain_filter.classList.remove('scale-100')
            contain_filter.classList.add('scale-0')
            setTimeout(()=>{
                filter.classList.add('hidden')
            }, 300)
        })

        function handleBack() {
            alert('Filter ditutup!'); 
        }

        function formatRupiah(input) {
            let value = input.value;

            let cleanValue = value.replace(/[^0-9]/g, '');

            let formattedValue = '';
            let count = 0;

            for (let i = cleanValue.length - 1; i >= 0; i--) {
                count++;
                formattedValue = cleanValue[i] + formattedValue;
                if (count % 3 === 0 && i !== 0) {
                    formattedValue = '.' + formattedValue;
                }
            }

            input.value = 'Rp ' + formattedValue;
        }
        
        const button = document.getElementById('tipe-menu-button');
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

        slides.forEach((slide, index) => {
            slide.style.left = `${slideWidth * index}px`;
        });

        const updateButtons = (currentIndex) => {
 
            if (currentIndex === 0) {
                prevButton.classList.add('hidden');
            } else {
                prevButton.classList.remove('hidden');
            }

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

        updateButtons(0);

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
