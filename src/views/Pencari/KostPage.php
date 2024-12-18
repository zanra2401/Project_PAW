<?php 
    require "./views/Components/HeadKostPage.php"; 
    function formatRupiah($angka) {
        $angka = (float) $angka;
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }

    $id_user = $data['id_user'];
    $id_kost = $data['id'];
    $isFavorited = $data['check_favorit'];
    $iconClass = $isFavorited === 'ada' ? 'fa-solid fa-heart text-red-600' : 'fa-regular fa-heart';
    $buttonText = $isFavorited === 'ada' ? 'Disimpan' : 'Simpan';

    $total_review = count($data['review']);

?>

<body>
    <?php require "./views/Components/NavBar.php" ?> 
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
                    <?php foreach($data['data'] as $kost):?>
                        <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?= $kost['data_kost']['nama_kost'];?></span>
                    <?php endforeach;?>
                </div>
                </li>
            </ol>
        </div>
    </div>
    <?php foreach($data['data'] as $kost):?>
        <?php 
            $harga = formatRupiah($kost['data_kost']['harga_kost']);
            echo <<<EOD
                <div class="w-[90%] mx-auto pt-4 items-center" id="gambar">
                    <div class="grid w-full flex-1">
                        <div class="grid grid-cols-2 gap-2">
            EOD;
            $temp = 0;
            $path = "/" . PROJECT_NAME . "/";
            $profle_pemilik = $path . $kost['profile_pemilik'];
            foreach ($kost['gambar'] as $gambar)
            {
                
                if ($temp > 4){
                    break;
                }

                if ($temp == 0){
                    $imagePath = $path . $gambar['path_gambar'];
                    echo <<<EOD
                        <div class="w-full h-[400px]">
                            <img class="h-full object-cover w-full" src="{$imagePath} " alt="">
                        </div>
    
                        <div class="grid grid-cols-2 gap-2 h-[400px] relative overflow-hidden">
                    EOD;
                } else {
                    $imagePath = $path . $gambar['path_gambar'];
                    echo <<<EOD
                        <img src="{$imagePath}" alt="" class="object-cover w-full h-full">
                    EOD;
                }

                $temp += 1;
            }

            echo <<<EOD
                                <a class="absolute bottom-3 right-3 bg-white text-black px-4 py-2 rounded shadow-lg duration-300 font-medium hover:bg-[#83493d] hover:text-white" href="/project_paw/pencari/reviewGambarKost/{$kost['data_kost']['id_kost']}">
                                    Lihat semua foto
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4 pt-5" id="isi_kostpage">
                        <div class="w-[63%]">
                            <div class="grid gap-4 border-b border-gray-200">
                                <p class="text-4xl font-semibold">{$kost['data_kost']['nama_kost']}</p>    
                                <div class="flex items-center">
                                    <p class="p-2 border-2 border-gray-300 rounded flex items-center mr-4" >Kos {$kost['data_kost']['tipe_kost']}</p>
                                    <i class="fa-solid fa-location-dot mr-2"></i>
                                    <p id="alamat_kost"></p>
                                </div>
                                <div class="flex items-center justify-between mb-7">
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-bed mr-2"></i>
                                        <p>Tersisa <span class="text-red-600 italic">{$kost['sisa_kamar']} Kamar</span></p>
                                    </div>
            
                                    <div class="flex gap-3">
                                        <form id="favoritForm" action="/<?= PROJECT_NAME ?>/Pencari/KostPage" class="grid gap-5" method="POST">
                                            <input type="hidden" name="id_user_favorit" id="id_user_favorit" value="$id_user">
                                            <input type="hidden" name="id_kost_favorit" id="id_kost_favorit" value="$id_kost">
                                            <input type="hidden" id="isFavorited" value="{$isFavorited}">
                                            <button id="tombolFavorit" type="button" class="p-2 border-2 border-gray-300 w-[110px] duration-300 rounded hover:opacity-70">
                                                <i id="favoritIcon" class="$iconClass"></i>
                                                <span id="favoritText">$buttonText</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-5 pb-5 border-b border-gray-200">
                                <p class="text-2xl">Kost dikelola oleh {$kost['pemilik']}</p>
                                <img class="rounded-full w-16 cursor-pointer" src="$profle_pemilik" alt="">
                            </div>
                            <div class="flex flex-col gap-6 mt-5 pb-5 border-b border-gray-200">
                                <p class="text-3xl font-semibold">Fasilitas Kamar</p>
                                <div class="grid grid-cols-3 gap-5 text-lg font-medium">
            EOD;

                foreach($data['fasilitas']['kamar'] as $fas){
                    echo <<<EOD
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-check"></i>
                            <p>{$fas}</p>
                        </div>
                    EOD;
                }
            
            echo <<<EOD
                                </div>
                            </div>
                            <div class="grid gap-6 border-b border-gray-200 pb-10 mt-5">
                                <p class="text-3xl font-semibold">Fasilitas Bersama</p>
                                <div class="grid grid-cols-3 gap-5 text-lg font-medium">
            
            EOD;

                foreach($data['fasilitas']['bersama'] as $fas){
                    echo <<<EOD
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-check"></i>
                            <p>{$fas}</p>
                        </div>
                    EOD;
                }
            
            echo <<<EOD
                                </div>
                            </div>
                            <div class="grid gap-4 border-b border-gray-200 pb-10 mt-5">
                                <p class="text-3xl font-semibold">Deskripsi Kost</p>
                                <div class="grid">
                                    <p>{$kost['data_kost']['deskripsi_kost']}</p>
                            
                                </div>
                            </div>
                            <div class="grid gap-4 border-b border-gray-200 pb-10 mt-5">
                                <p class="text-3xl font-semibold">Lokasi Kost</p>
                                <div class="relative">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d875.0521723479558!2d112.7146898698041!3d-7.126118634089472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMDcnMzQuMCJTIDExMsKwNDInNTQuOCJF!5e1!3m2!1sid!2sid!4v1733398728035!5m2!1sid!2sid" width="770px" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="grid gap-4 border-b border-gray-200 pb-10 mt-5">
                                <div class="flex justify-between mt-5 items-center">
                                    <p>Ada ketidaksesuaian data yang di berikan atau kendala lain dengan kost ini?</p>
                                    <button id="tombol_melapor" class="p-2 border-2 border-gray-300 w-[110px] duration-300 rounded hover:opacity-70">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        <span>Laporkan</span>
                                    </button>
                                </div>
                            </div>
            
                            <div class="border-b border-gray-200 pb-10 mt-5">
                                <p class="text-3xl font-semibold">{$total_review} Review</p>
            EOD;
                            $path = "/" . PROJECT_NAME . "/";
                            foreach ($data['review'] as $rev){
                                $pp_user = $path . $rev['profile_user']; 
                                echo <<<EOD
                                    <div class="grid gap-4 pt-4">
                                        <div class="flex items-center gap-3 justify-between">
                                            <div class="flex items-center gap-4">
                                                <img class="rounded-full w-14" src="{$pp_user}" alt="">
                                                <div class="grid gap-0">
                                                    <p class="font-semibold text-xl">{$rev['username_user']}</p>
                                                    <p class="text-sm">{$rev['tanggal_review']}</p>
                                                </div>
                                            </div>
                                            <div class="flex gap-2">
                                                <button id="suka_ulasan" class="text-xl">
                                                    <i class="fa-regular fa-thumbs-up" id="icon_sukaUlasan"></i>
                                                </button>
                                                <p class="text-lg mt-1">2</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="mb-5">{$rev['isi_review']}</p>
                                            <div class="grid gap-3 p-4 bg-gray-200">
                                                <p class="font-semibold">Respon Pemilik Kos : </p>
                                                <p>Halo, Kakak. Terima kasih atas reviewnya. Semoga Anda selalu betah untuk singgah di kost kami :)</p>
                                            </div>
                                        </div>
                                    </div>
                                EOD;
                            }
            echo <<<EOD
                            </div>
                        </div>
                        <div id="tableView" class="bg-white rounded-md" style="width: 400px; box-shadow: 1px 0px 40px -17px rgba(0,0,0,0.68); height: 280px; top: 110px; right: 5%;">
                            <div class="flex flex-col p-4">
                                <div > 
                                    <p class="text-lg font-normal">Harga</p>
                                    <p class="font-semibold text-2xl">{$harga} /Bulan</p>
                                </div>  
                                <div class="space-y-3 w-full" style="margin-top: 45px;">
                                    <a href="/project_paw/pencari/chatting/{$data['id_pemilik']}" class="border-2 p-2 rounded px-3 w-full flex items-center justify-center chat">
                                        <i class="fa-solid fa-comment-dots pr-2"></i>
                                        Tanya Pemilik 
                                    </a>
                                    <button id="kamar" class="border-2 p-2 rounded px-3 w-full flex items-center justify-center lihat-kamar" >
                                        <i class="fa-solid fa-bed pr-2"></i>
                                        Lihat Kamar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" w-[90%] rounded-3xl mx-auto grid gap-10 mb-10" style="margin-top:30px;">
                    <div>
                        <p class="text-2xl font-semibold">Rekomendasi kos lain yang mungkin anda suka</p>
                    </div>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    
            EOD;
                        foreach($data['rekomendasi'] as $kost){
                            $harga = formatRupiah($kost['data_kost']['harga_kost']);
                            $path = "/" . PROJECT_NAME . "/";
                            echo <<<EOD
                                <a href="/project_paw/pencari/kostPage/{$kost['data_kost']['id_kost']}" class="group">
                                    <div class="carousel">
                                        <div class="carousel-track-container">
                                            <ul class="carousel-track">
                            EOD;
                            foreach ($kost['gambar'] as $gambar)
                            {
                                $imagePath = $path . $gambar['path_gambar'];
                                echo <<<EOD
                                    <li class="carousel-slide current-slide">
                                        <img src="{$imagePath}" alt="Image 1">
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
                        }
            echo <<<EOD
                    </div>
                </div>
                <?php require './views/Components/FooterHomepage.php' ?>
                <div id="report" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" style="z-index:100;">
                    <div class="bg-white p-6 rounded shadow-lg w-1/3 transition-all duration-300 transform scale-0" id="contain_report">
            EOD;
                    ?>    
    <?php endforeach;?>
    <?php if($data['sudah_lapor']):?>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-red-500">Anda sudah melaporkan kost ini</h2>
                <button class="text-gray-700 hover:opacity-70" id="close_report">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
                </div>
        <?php else:?>
            <form action="/<?= PROJECT_NAME ?>/Pencari/KostPage" class="grid gap-5" method="POST">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-bold">Laporkan Kost</h2>
                            <button class="text-gray-700 hover:opacity-70" id="close_report" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            </button>
                            </div>
                        <div class="grid gap-4">
                            <div class="pt-4 w-full max-w-md">
                                    <?php 
                                        foreach($data['kategori_laporan'] as $dat)
                                        {
                                            echo <<<EDO
                                                <section class="flex items-center mb-4">
                                                <input type="checkbox" name="kategori_laporan[]" class="w-4 h-4 border-gray-300 rounded focus:ring-2" value="{$dat['id_kategori_laporan']}">
                                                <label for="foto" class="ml-2 text-gray-700">{$dat['nama_laporan']}</label>
                                                </section>
                                            EDO;
                                        }
                                    ?>
                            </div>
                            <input type="text" value="<?= $data['id'];?>" name="id_kost" style="display: none;">
                            <div class="grid">
                                <textarea name="detail_laporan" id="detail_laporan" placeholder="Jelaskan lebih detail disini.." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#83493d] focus:border-[#83493d] resize-none h-40"></textarea>
                            </div>
                        </div>
                        <button type="submit" id="laporkan" class="disabled:opacity-50 disabled:bg-gray-400 px-3 py-2 bg-red-700 text-white font-semibold rounded-lg shadow-md hover:opacity-60 focus:outline-none focus:ring-2" disabled>
                            Laporkan
                        </button>
                    </form>
                </div>
            </div>   
        <?php endif;?>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        const gambar = document.getElementById('gambar')
        const tableView = document.getElementById('tableView')
        const isi_kostpage = document.getElementById('isi_kostpage')

        window.addEventListener('scroll', () => {
            const rect1 = isi_kostpage.getBoundingClientRect();
            const rect = gambar.getBoundingClientRect();
            const initialRect = tableView.getBoundingClientRect().top;
            console.log(rect1.top);
            if (rect1.top <= 90 && rect.bottom > 389.6875) {
                tableView.classList.add('fixed');
            } else if (rect.bottom <= 389.6875) {
                tableView.classList.remove('fixed');
                tableView.classList.add('self-end')
            } else {
                tableView.classList.remove('self-end')
                tableView.classList.remove('fixed');
            }
        });

        document.getElementById('tombolFavorit').addEventListener('click', () => {
            const id_user_favorit = document.getElementById('id_user_favorit').value;
            const id_kost_favorit = document.getElementById('id_kost_favorit').value;
            const favorit_form = document.getElementById('favoritForm');
            let isFavorited = document.getElementById('isFavorited').value; 
            
            if(isFavorited == 'ada'){
                isFavorited = 'tidak ada'; 
            }else {
                isFavorited = 'ada';
            }
            
            console.log(isFavorited)

            const icon = document.getElementById('favoritIcon');
            const text = document.getElementById('favoritText');

            if (isFavorited === 'ada') {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid', 'text-red-600');
                text.textContent = 'Disimpan';
            } else {
                icon.classList.remove('fa-solid', 'text-red-600');
                icon.classList.add('fa-regular');
                text.textContent = 'Simpan';
            }
            
            document.getElementById('isFavorited').value = isFavorited;

            const data = new URLSearchParams({
                id_user_favorit: id_user_favorit,
                id_kost_favorit: id_kost_favorit,
                isFavorited: isFavorited
            });
            
            fetch('/<?= PROJECT_NAME ?>/Pencari/KostPage', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: data
            })
            .then(response => response.text())
        });


        flatpickr("#datepicker", {
            minDate: "today",
            onOpen: function(selectedDates, dateStr, instance) {
                const calendarContainer = instance.calendarContainer;
                const titleElement = document.createElement('div');
                titleElement.classList.add('calendar-title', 'text-center', 'font-semibold', 'text-lg', 'mb-2');
                
                titleElement.innerHTML = 'Ingin mulai <br> kost tanggal berapa?';
                if (!calendarContainer.querySelector('.calendar-title')) {
                    calendarContainer.insertBefore(titleElement, calendarContainer.firstChild);
                }
            }   
        });

        const tombol_lapor = document.getElementById('tombol_melapor')
        const report = document.getElementById('report')
        const close_report = document.getElementById('close_report')
        const contain_report = document.getElementById('contain_report')
        const checkbox = document.querySelectorAll('input[type="checkbox"]');
        const textarea = document.getElementById('detail_laporan');
        const laporkan = document.getElementById('laporkan')

        tombol_lapor.addEventListener('click', ()=>{
            report.classList.remove('hidden')
            setTimeout(()=>{
                contain_report.classList.remove('scale-0')
                contain_report.classList.add('scale-100')
            }, 50)
        })

        close_report.addEventListener('click', ()=>{
            contain_report.classList.remove('scale-100')
            contain_report.classList.add('scale-0')
            setTimeout(()=>{
                report.classList.add('hidden')
            }, 300)
            
        })

        function validasiFromLaporan() {

            let pilih_checkbox = false;

            checkbox.forEach(checkboxs => {
                if (checkboxs.checked) {
                    pilih_checkbox = true;
                }
            });

            if (pilih_checkbox && textarea.value !== '') {
                laporkan.disabled = false; 
            } else {
                laporkan.disabled = true; 
            }
        }

        window.onload = () => {   
            checkbox.forEach(checkboxs => {
                checkboxs.addEventListener('change', validasiFromLaporan); 
            });

            textarea.addEventListener('input', validasiFromLaporan)
            validasiFromLaporan(); 
        };

        // const track = document.querySelector('.carousel-track');
        // // const slides = Array.from(track.children);
        // const nextButton = document.querySelector('.right-button');
        // const prevButton = document.querySelector('.left-button');

        // const slideWidth = slides[0].getBoundingClientRect().width;

        // slides.forEach((slide, index) => {
        //     slide.style.left = `${slideWidth * index}px`;
        // });

        // const updateButtons = (currentIndex) => {
 
        //     if (currentIndex === 0) {
        //         prevButton.classList.add('hidden');
        //     } else {
        //         prevButton.classList.remove('hidden');
        //     }

        //     if (currentIndex === slides.length - 1) {
        //         nextButton.classList.add('hidden');
        //     } else {
        //         nextButton.classList.remove('hidden');
        //     }
        // };

        // const moveToSlide = (track, currentSlide, targetSlide) => {
        //     track.style.transform = `translateX(-${targetSlide.style.left})`;
        //     currentSlide.classList.remove('current-slide');
        //     targetSlide.classList.add('current-slide');

        //     const targetIndex = slides.findIndex(slide => slide === targetSlide);
        //     updateButtons(targetIndex);
        // };

        // updateButtons(0);

        // prevButton.addEventListener('click', (e) => {
        //     e.preventDefault();
        //     const currentSlide = track.querySelector('.current-slide');
        //     const prevSlide = currentSlide.previousElementSibling;
        //     if (prevSlide) moveToSlide(track, currentSlide, prevSlide);
        // });

        // nextButton.addEventListener('click', (e) => {
        //     e.preventDefault();
        //     const currentSlide = track.querySelector('.current-slide');
        //     const nextSlide = currentSlide.nextElementSibling;
        //     if (nextSlide) moveToSlide(track, currentSlide, nextSlide);
        // });


        document.addEventListener("DOMContentLoaded", async () => {
            const alamat = document.getElementById("alamat_kost");
            let id_kota = <?=$kost['data_kost']['kota_kost'];?>;
            let id_provinsi = <?=$kost['data_kost']['provinsi_kost']?>;
            let nama_provinsi = '';
            let nama_kota = '';
            
            await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id_provinsi}.json`)
            .then(response => response.json())
            .then(kotas => {
                kotas.forEach(element => {
                    if (element['id'] == id_kota) {
                        alamat.innerHTML += `${element['name']}, `;
                        
                        return;
                    }
                })
            });

            await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
            .then(response => response.json())
            .then(provinces => {
                provinces.forEach(element => {
                    if (element['id'] == id_provinsi) {
                        alamat.innerHTML += `${element['name']}`;
               
                        return;
                    }
                });
            });
            })


            

            
    
    

    </script>
</body>
<?php require "./views/Components/Foot.php"; ?>