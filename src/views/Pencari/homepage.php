<?php 
    require './views/Components/HeadHomepage.php'; 

    function formatRupiah($angka) {
        $angka = (float) $angka;
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
    
    $data_profile = isset($data['profile']['profile_user'])? $data['profile']['profile_user']: '';
    
?>
<body>
    <?php require "./views/Components/NavBar.php" ?>  
    <form action="/<?= PROJECT_NAME ?>/Pencari/homepage" method="POST" id="form_search">
    <div class="absolute top-0 left-0 h-3/4 bg-[#d7dbdd] rounded-b-[50px] -z-10 overflow-y-hidden"  style="width: 100%;"></div>
    <div class="w-[90%] rounded-3xl mt-[50px] mx-auto">
        <h1 class="text-center text-3xl font-bold px-4" style="color:#83493d;">Sekarang Cari Kost Bisa Sambil Rebahan</h1>
        <p class="mt-4 text-center sm:text-bold px-4">
            Bingung Mau Cari Kost Dimana? Disini Aja! Cari kost jadi lebih mudah, cepat, dan hemat waktu.
        </p>
        <div class="flex bg-white mx-auto rounded-full mt-[20px] justify-center items-center search-bar" style="height: 70px; width: 80%; gap:10px;">
            <div class="relative w-1/2 field-inputan-search">
                <input name="lokasi_nama" id="nama_lokasi" type="text" placeholder="Cari lokasi atau nama kost.." class="w-full p-3 pl-10 border border-gray-300 rounded-full shadow-md focus:outline-none focus:ring focus:ring-warna-second">
                <i class="fas fa-location-dot absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div>
            <div class="relative">
                <button id="dropdownButton" type="button" class="inline-flex justify-between w-full min-w-[160px] p-3 pl-10 pr-8 border border-gray-300 bg-white rounded-full shadow-md focus:outline-none focus:ring focus:ring-blue-300 items-center">
                    <span id="dropdownSelected" class="text-gray-700">Pilih Tipe</span>
                    <i class="fas fa-house absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <i class="fas fa-caret-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </button>
                <div id="dropdownMenu" class="absolute hidden bg-white shadow-lg ring-1 ring-black ring-opacity-5 mt-2 w-full rounded-2xl z-10">
                    <div class="py-1">
                        <div class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer dropdown-item" data-value="Putra">
                            <i class="fas fa-person text-gray-500 mr-3"></i>
                            <span class="text-gray-700">Kost Putra</span>
                        </div>
                        <div class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer dropdown-item" data-value="Putri">
                            <i class="fas fa-person-dress text-gray-500 mr-3"></i>
                            <span class="text-gray-700">Kost Putri</span>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="tipe" id="dropdownValue"> 
            <div class="relative">
                <button type="submit" name="find" class="inline-flex justify-center w-full p-3 pl-10 pr-8 borde rounded-full shadow-md tombol-search hover:opacity-70" style="background-color: #83493d; color:#fff;">
                    <span class="temukan-kost">Temukan Kost</span>
                </button>
                <i class="fas w-20 fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-white cursor-pointer logo-search"></i>
            </div>
            <div class="relative logo-menu">
                <button type="button" class="w-full p-3 rounded-full hover:opacity-70" id="filter_button"><i class="fas fa-sliders top-1/2 transform text-gray-500 "></i></button>
            </div>
        </div>
    </div>
    
    <div id="filter" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded shadow-lg w-1/2 transition-all duration-300 transform scale-0 h-[80%]" id="contain_filter">
            <div class="grid grid-cols-2 p-6">
                <button class="text-gray-700 hover:opacity-70 " id="close_filter" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <p class="text-base-color font-semibold text-2xl">FILTER</p>
            </div>
            <div class="grid">
                <div class="rounded-xl h-[380px] overflow-y-scroll p-6 grid gap-5">
                    <div class="grid gap-5">
                        <p class="block text-gray-600 font-medium mb-2 text-xl">Urutkan</p>
                        <div class="grid gap-3">
                            <label class="flex items-center gap-3">
                                <input type="radio" name="harga" class="hidden peer" value="ASC">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-warna-second peer-checked:bg-warna-second transition"></div>
                                <span class="text-gray-700 peer-checked:text-warna-second font-medium">Harga terendah</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="radio" name="harga" class="hidden peer" value="DESC">
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
                                name="min_harga"
                                id="min_harga"
                                placeholder="Min"
                                class="w-1/2 border h-14 border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-warna-second"
                                oninput="formatRupiah(this); checkMaxValue()" />
                            
                            <div class="flex items-center justify-center px-4">-</div>
                            
                            <input 
                                type="text" 
                                name="max_harga"
                                id="max_harga"
                                placeholder="Max"
                                class="w-1/2 border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-warna-second"
                                oninput="formatRupiah(this); checkMinValue()" />
                        </div>

                        
                    </div>
                    <div class="grid gap-5">
                        <label class="block text-gray-600 font-medium mb-2 text-xl">Fasilitas bersama</label>
                        <div class="grid grid-cols-2 grid-rows-4 gap-5">
                            <?php 
                                foreach($data['fasilitas'] as $fas => $nama_fasilitas) {
                                    if ($fas <= 8){
                                        echo <<<DEO
                                            <label class="container">
                                                <input type="checkbox" name="{$fas}" value="$fas">
                                                <div class="checkmark"></div>
                                                <span>{$nama_fasilitas}</span>
                                            </label>
                                        DEO;
                                    } 
                                    
                                }
                            ?>
                        </div>
                    </div>
                    <div class="grid gap-5">
                        <label class="block text-gray-600 font-medium mb-2 text-xl">Fasilitas Kamar</label>
                        <div class="grid grid-cols-2 grid-rows-4 gap-5">
                            <?php 
                                foreach($data['fasilitas'] as $fas => $nama_fasilitas) {
                                    if($fas > 8) {
                                        echo <<<DEO
                                            <label class="container">
                                                <input type="checkbox" name="{$fas}" value="$fas">
                                                <div class="checkmark"></div>
                                                <span>{$nama_fasilitas}</span>
                                            </label>
                                        DEO;
                                    }
                                }
                            ?>
                        </div>

                    </div>
                </div>
                <div class="flex justify-between items-center p-6 border-t border-gray-100">
                    <button class="font-medium hover:opacity-70" id="reset-button" type="button">Reset</button>                    
                    <button 
                        id="terapkan"
                        type="button"
                        class="w-[130px] text-white py-2 rounded-lg font-medium focus:outline-none focus:ring focus:ring-[#83493d] hover:opacity-70"
                        style="background-color: #83493d;">
                        Terapkan Filter
                    </button>
                </div>
            </div>
        </div>
    </div>
        </form>
    
    <div class="bg-white w-[90%] rounded-3xl mx-auto shadow-lg" style="margin-top:30px;">
        <div class="mx-auto max-w-2xl p-8 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <?php foreach($data['data'] as $kost): ?>
                    <?php 
                        $harga = formatRupiah($kost['data_kost']['harga_kost']);
                        $path = "/" . PROJECT_NAME . "/";
                        echo <<<EOD
                            <a href="/project_paw/pencari/kostPage/{$kost['data_kost']['id_kost']}" class="group ">
                                <div class="carousel">
                                    <div class="carousel-track-container">
                                        <ul class="carousel-track">
                        EOD;
                                foreach ($kost['gambar'] as $gambar)
                                {
                                    $imagePath = $path . $gambar['path_gambar'];
                                    echo <<<EOD
                                        <li class="carousel-slide current-slide w-full h-40 overflow-hidden">
                                            <img src="{$imagePath}" alt="Image 1" class="object-fit">
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
                                 <p data-kota="{$kost['data_kost']['kota_kost']}" data-provinsi="{$kost['data_kost']['provinsi_kost']}">
                                    Loading...
                                </p>
                                <p class="mt-1 text-lg font-medium text-gray-900">{$harga} / Bulan</p>
                            </a>
                        EOD;
                    ?>
                <?php endforeach; ?>
           </div>
        </div>
    </div>

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
    

    <?php require './views/Components/FooterHomepage.php' ?>
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

        const filter_button = document.getElementById('filter_button')
        const filter = document.getElementById('filter')
        const close_filter = document.getElementById('close_filter')
        const contain_filter = document.getElementById('contain_filter')
        const terapkan = document.getElementById('terapkan')

        filter_button.addEventListener('click', ()=>{
            filter.classList.remove('hidden')
            setTimeout(()=>{
                contain_filter.classList.remove('scale-0')
                contain_filter.classList.add('scale-100')
            }, 50)
        })

        close_filter.addEventListener('click', ()=>{
            event.preventDefault(); 
            
            document.querySelectorAll('#filter input[type="text"]').forEach(input => {
                input.value = ''; 
            });

            document.querySelectorAll('#filter input[type="radio"]').forEach(radio => {
                radio.checked = false; 
            });

            document.querySelectorAll('#filter input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false; 
            });

            contain_filter.classList.remove('scale-100')
            contain_filter.classList.add('scale-0')
            setTimeout(()=>{
                filter.classList.add('hidden')
            }, 300)
        })

        terapkan.addEventListener('click', ()=>{
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

        document.getElementById('reset-button').addEventListener('click', function(event) {
            event.preventDefault(); 
            
            document.querySelectorAll('#filter input[type="text"]').forEach(input => {
                input.value = ''; 
            });

            document.querySelectorAll('#filter input[type="radio"]').forEach(radio => {
                radio.checked = false; 
            });

            document.querySelectorAll('#filter input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false; 
            });
        });

        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const dropdownSelected = document.getElementById('dropdownSelected');
        const iconLeft = dropdownButton.querySelector('.fa-house');
        const hiddenInput = document.getElementById('dropdownValue'); 
        const searchInput = document.querySelector('input[name="lokasi_nama"]');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        dropdownItems.forEach(item => {
            item.addEventListener('click', () => {
                const value = item.getAttribute('data-value');
                const text = item.querySelector('span').textContent;

                dropdownSelected.textContent = text;
                hiddenInput.value = value; 

                if (value === 'pria') {
                    iconLeft.className = 'fas fa-person absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500';
                } else if (value === 'wanita') {
                    iconLeft.className = 'fas fa-person-dress absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500';
                }
                dropdownMenu.classList.add('hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const carousels = document.querySelectorAll('.carousel');
            carousels.forEach((carousel) => {
                const track = carousel.querySelector('.carousel-track');
                const slides = Array.from(track.children);
                const nextButton = carousel.querySelector('.right-button');
                const prevButton = carousel.querySelector('.left-button');

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
            });

        });



        const form_search = document.getElementById('form_search');
        form_search.addEventListener('submit', async (event) => {
            event.preventDefault();

            const nama_lokasi = document.getElementById('nama_lokasi');
            let nl = nama_lokasi.value.toUpperCase(); 
            let found = false;

            const provinces = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
                .then(response => response.json());

            for (let element of provinces) {
                if (element['name'].toUpperCase() === nl) {
                    nama_lokasi.value = element['id']; 
                    found = true;
                    break;
                }
            }

            for (let province of provinces) {
                const cities = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${province['id']}.json`)
                    .then(response => response.json());

                for (let city of cities) {
                    if (city['name'].toUpperCase() === nl) {
                        nama_lokasi.value = city['id']; 
                        found = true;
                        break;
                    }
                }

                if (found) break; 
            }

            form_search.submit();


        });

    </script>
</body>
