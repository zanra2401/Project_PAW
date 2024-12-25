<?php 
    require "./views/Components/HeadKostPage.php"; 

    $model = new PencariModel();
    function formatRupiah($angka) {
        $angka = (float) $angka;
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }

    $id_kost = $data['id'];

    if (isset($_SESSION["loged_in"])){
        $id_user = $data['id_user'];
        $isFavorited = $data['check_favorit'];
        $iconClass = $isFavorited === 'ada' ? 'fa-solid fa-heart text-red-600' : 'fa-regular fa-heart';
        $buttonText = $isFavorited === 'ada' ? 'Disimpan' : 'Simpan';
    }

    $total_review = count($data['review']);
    $isLogin = isset($_SESSION["loged_in"])? 'login': 'belom';

    $sudah_lapor = isset($data['sudah_lapor'])? $data['sudah_lapor']: '';
?>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-cbiugUUXzP_WNrv0"></script>
<script src="<?= NODE_MODULES ?>leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="<?= NODE_MODULES ?>leaflet/dist/leaflet.css">
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
                    <div class="flex justify-between mt-4 pt-5 gap-3" id="isi_kostpage">
                        <div class="w-[60%]">
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
            EOD;             

                                if (isset($_SESSION["loged_in"])) {
                                    echo <<<EOD
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
                                    EOD;
                                }
            echo <<<EOD
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-5 pb-5 border-b border-gray-200">
                                <p class="text-2xl">Kost dikelola oleh {$kost['pemilik']}</p>
                                <img class="rounded-full w-16 h-16 cursor-pointer" src="$profle_pemilik" alt="">
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
                                <p class="text-3xl font-semibold">Lokasi Kost</p>
                                <div class="relative h-fit py-4 border-t-2">
                                    <div id="map" style="height: 400px; width: 100%;" class="relative z-10">
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-4 border-b border-gray-200 pb-10 mt-5">
                                <div class="flex justify-between mt-5 items-center">
                                    <p>Ada ketidaksesuaian data yang di berikan atau kendala lain dengan kost ini?</p>
            EOD;
                                if($isLogin == 'login'){
                                    echo <<<EDO
                                        <button id="tombol_melapor" class="p-2 border-2 border-gray-300 w-[110px] duration-300 rounded hover:opacity-70">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            <span>Laporkan</span>
                                        </button>
                                    EDO;
                                }
            echo <<<EOD
                                </div>
                            </div>
            
                            <div class="border-b border-gray-200 pb-10 mt-5">
                                <p class="text-3xl font-semibold">{$total_review} Review</p>
                                    <form id="form_like" action="/project_paw/Pencari/KostPage" method="POST">
            EOD;

                            $path = "/" . PROJECT_NAME . "/";
                            foreach ($data['review'] as $rev) {
                                if($isLogin == 'login')
                                {
                                    $id_review = $rev['id_review'];
                                    
                                    $isLiked = $model->checkIfLiked($id_review, $_SESSION['id_user']); // Cek apakah user sudah menyukai review ini
                                    $iconClass = $isLiked == 'ada' ? "fa-solid fa-thumbs-up" : "fa-regular fa-thumbs-up"; // Ikon berubah jika sudah di-*like*        
                                }
                                $pp_user = $path . $rev['profile_user'];
                                echo <<<EOD
                                    <div class="grid gap-4 pt-4">
                                        <div class="flex items-center gap-3 justify-between">
                                            <div class="flex items-center gap-4">
                                                <img class="rounded-full w-14 h-14" src="{$pp_user}" alt="">
                                                <div class="grid gap-0">
                                                    <p class="font-semibold text-xl">{$rev['username_user']}</p>
                                                    <p class="text-sm">{$rev['tanggal_review']}</p>
                                                </div>
                                            </div>

                                EOD;
                                        if($isLogin == 'login'){
                                            echo <<<EOD
                                                <div class="flex gap-2">
                                                    <button name="review_suka" class="text-xl suka-ulasan-btn" type="button" onclick="toggleLike($id_review)">
                                                        <i class="{$iconClass}" id="icon_sukaUlasan_{$id_review}"></i>
                                                    </button>
                                                    <input type="hidden" id="status_{$id_review}" value="{$isLiked}">
                                                    <p class="text-lg mt-1" id="total_suka_{$id_review}">{$rev['total_suka']}</p>
                                                </div>
                                            EOD;
                                        } 
                                echo <<<EOD
                                        </div>
                                        <div>
                                            <p class="mb-5">{$rev['isi_review']}</p>
                               EOD; 
                                                if($rev['isi_balasan_review'] != NULL){
                                                    echo <<<EOD
                                                        <div class="grid gap-3 p-4 bg-gray-200">
                                                            <p class="font-semibold">Respon Pemilik Kos : </p>
                                                            <p>{$rev['isi_balasan_review']}</p>
                                                        </div>
                                                    EOD;
                                                }
                                echo <<<EOD
                                        </div>
                                    </div>
                                EOD;
                            }
                            
            echo <<<EOD
                                </form>
                            </div>
                        </div>
                        <div id="tableView" class="bg-white rounded-md" style="width: 400px; box-shadow: 1px 0px 40px -17px rgba(0,0,0,0.68); height: 370px; top: 110px; right: 5%; ">
                            <div class="flex flex-col p-4">
                                <div > 
                                    <p class="text-lg font-normal">Harga</p>
                                    <p class="font-semibold text-2xl">{$harga} /Bulan</p>
                                </div>  
                                <div class="space-y-3 w-full" style="margin-top: 45px;">
            EOD;                
                                if($isLogin == "login"){
                                    echo <<<EOD
                                        <a href="/project_paw/pencari/chatting/{$data['id_pemilik']}" class="border-2 p-2 rounded px-3 w-full flex items-center justify-center chat">
                                            <i class="fa-solid fa-comment-dots pr-2"></i>
                                            Tanya Pemilik 
                                        </a>
                                    EOD;
                                } else {
                                    echo <<<EOD
                                        <a href="/project_paw/account/login" class="border-2 p-2 rounded px-3 w-full flex items-center justify-center chat">
                                            <i class="fa-solid fa-comment-dots pr-2"></i>
                                            Tanya Pemilik 
                                        </a>
                                    EOD;
                                }
            echo <<<EOD
                                    <a href="/project_paw/pencari/kamar/{$kost['data_kost']['id_kost']}" class="border-2 p-2 rounded px-3 w-full flex items-center justify-center lihat-kamar" >
                                        <i class="fa-solid fa-bed pr-2"></i>
                                        Lihat Kamar
                                    </a>
                                    <br><br>
            EOD;
                                if($isLogin == "login"){
                                    echo <<<EOD
                                        <button id="tombol_pesan" class="border-2 p-3 rounded px-3 w-full flex items-center justify-center bg-zinc-800 text-white font-semibold text-lg hover:opacity-80">Pesan kost</button>
                                    EOD;
                                } else {
                                    echo <<<EOD
                                        <a href="/project_paw/account/login" class="border-2 p-3 rounded px-3 w-full flex items-center justify-center bg-zinc-800 text-white font-semibold text-lg hover:opacity-80">Pesan kost</a>
                                    EOD;
                                }
            echo <<<EOD
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" w-[90%] rounded-3xl mx-auto grid gap-10 mb-10" style="margin-top:30px;">
                    <div>
            EOD;
                if (!empty($data['rekomendasi'])){
                    echo "<p class='text-2xl font-semibold'>Rekomendasi kos lain yang mungkin anda suka</p>";
                }
            echo <<<EOD
                    </div>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    
            EOD;
                        foreach($data['rekomendasi'] as $kost){
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
                        }
            echo <<<EOD
                    </div>
                </div>
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
            </div
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
                <?php endif;?>
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

    <div id="popup_pesan" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden" style="z-index: 9999;">
        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-5 transition-all duration-300 transform scale-0" id="box_pesan">
            <div class="flex justify-between items-center mb-7">
                <h2 class="text-lg font-semibold text-gray-800">Pilih Metode Pembayaran</h2>
                <button class="text-gray-700 hover:opacity-70" id="close_payment" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <p class="text-gray-600 mb-6">Silakan pilih metode pembayaran yang Anda inginkan:</p>
            <div class="flex flex-col space-y-4">
                <a 
                id="offlineButton" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition font-semibold"
                href="/<?= PROJECT_NAME ?>/pencari/pembayaranoffline/<?= $data['id_pemilik'] ?>/<?= $id_kost ?>"
                >
                Bayar Offline
                </a>
                <a 
                id="onlineButton" 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition font-semibold"
                href="/<?= PROJECT_NAME ?>/pencari/pembayaranonline/<?= $data['id_pemilik'] ?>/<?= $id_kost ?>"
                >
                Bayar Online
                </a>
            </div>
        </div>
    </div>

    
    <?php if (isset($_SESSION['snapToken'])): ?>
        <div id="popupOnline" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div id="snap-container" class="flex flex-col space-y-4">
            </div>
            <button 
                id="closeButtonOnline" 
                class="mt-6 text-gray-500 absolute hover:text-gray-800 text-2xl top-0 right-5"
                >
                <i class="fas fa-close"></i>
            </button>
        </div>
    <?php endif; ?>



    <!-- popUP harus login -->
    <div id="popup_harus_login" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <!-- Pop-up Content -->
        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 transition-all duration-300 transform scale-0" id="box_harus_login">
            <h2 class="text-lg font-semibold mb-4 text-red-500">Anda belum login!</h2>
            <div class="flex flex-col space-y-4">
                <button 
                id="button_arah_login" 
                class="bg-base-color text-white px-4 py-2 rounded hover:opacity-80 transition"
                >
                    Login
                </button>
                <button 
                    id="close_popUp_login" 
                    class="mt-6 text-gray-500 hover:text-gray-800 text-sm"
                >
                    Batal
                </button>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        const isLogin = '<?=$isLogin?>';
        console.log(isLogin);

        if (isLogin == 'login'){
            const tombol_ipesan = document.getElementById('tombol_pesan');
            const popup_pesan = document.getElementById('popup_pesan');
            const box_pesan = document.getElementById('box_pesan');
            const close_payment = document.getElementById('close_payment');
    
            tombol_pesan.addEventListener('click', ()=>{
                popup_pesan.classList.remove('hidden')
                setTimeout(()=>{
                    box_pesan.classList.remove('scale-0')
                    box_pesan.classList.add('scale-100')
                }, 50)
            })
    
            close_payment.addEventListener('click', ()=>{
                box_pesan.classList.remove('scale-100')
                box_pesan.classList.add('scale-0')
                setTimeout(()=>{
                    popup_pesan.classList.add('hidden')
                }, 300)
                
            })
    
            <?php if (isset($_SESSION['snapToken'])): ?>
            closeButtonOnline.addEventListener('click', ()=>{
                setTimeout(()=>{
                    popupOnline.classList.add('hidden')
                }, 300)
                
            })
            <?php endif; ?>
        }

        const map = L.map('map').setView([<?= $data['data'][$id_kost]['data_kost']['lat'] ?>, <?= $data['data'][$id_kost]['data_kost']['lng'] ?>], 10); // Jakarta
                    
        const markerLayer = L.layerGroup().addTo(map);

        const alidade = 'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png';
        const openstreetmap = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const stadiamaps = 'https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png';

        L.tileLayer(openstreetmap, {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        L.marker([<?= $data['data'][$id_kost]['data_kost']['lat'] ?>, <?= $data['data'][$id_kost]['data_kost']['lng'] ?>]).addTo(markerLayer);

        if (isLogin == 'login'){
            const toggleBoxBtn = document.getElementById("chat_button");
            const box = document.getElementById("box");
            const content = document.getElementById("content");
            const close_chat = document.getElementById('close_chat');
    
            if (toggleBoxBtn){
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
            }
            
            if (isLogin == 'login'){
                function toggleLike(idReview) {
                    const icon_like = document.getElementById(`icon_sukaUlasan_${idReview}`);
                    const total_suka = document.getElementById(`total_suka_${idReview}`);
                    const status_like = document.getElementById(`status_${idReview}`);
                    const status_like_val = status_like.value;
                    let total_suka_val = parseInt(total_suka.textContent);
        
                    if (status_like_val == 'ada'){
                        icon_like.className = 'fa-regular fa-thumbs-up';
                        total_suka.innerHTML = total_suka_val-1
                        status_like.value = "tidak ada"
                    } else {
                        icon_like.className = 'fa-solid fa-thumbs-up';
                        total_suka.innerHTML = total_suka_val+1
                        status_like.value = "ada"
                    }
        
                    const data = new URLSearchParams({
                        review_suka: idReview,
                        isLiked: status_like_val
                    });
        
        
                    fetch('/<?= PROJECT_NAME?>/Pencari/KostPage', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: data
                    })
                    .then(response => response.text())
                }
            }
    
            
        }
        
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
        
        const gambar = document.getElementById('gambar')
        const tableView = document.getElementById('tableView')
        const isi_kostpage = document.getElementById('isi_kostpage')

        window.addEventListener('scroll', () => {
            const rect1 = isi_kostpage.getBoundingClientRect();
            const rect = gambar.getBoundingClientRect();
            const initialRect = tableView.getBoundingClientRect().top;
            if (rect1.top <= 90 && rect.bottom > 476.796875) {
                tableView.classList.add('fixed');
            } else if (rect.bottom <= 476.796875) {
                tableView.classList.remove('fixed');
                tableView.classList.add('self-end')
            } else {
                tableView.classList.remove('self-end')
                tableView.classList.remove('fixed');
            }
        });

        if (isLogin == 'login'){
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
                
                fetch('/<?= PROJECT_NAME?>/Pencari/KostPage', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: data
                })
                .then(response => response.text())
            });

            const tombol_lapor = document.getElementById('tombol_melapor')
            const report = document.getElementById('report')
            const close_report = document.getElementById('close_report')
            const contain_report = document.getElementById('contain_report')
            const checkbox = document.querySelectorAll('input[type="checkbox"]');
            const textarea = document.getElementById('detail_laporan');
            const laporkan = document.getElementById('laporkan')
    
            const popup_harus_login = document.getElementById('popup_harus_login');
            const box_harus_login = document.getElementById('box_harus_login');
            const button_arah_login = document.getElementById('button_arah_login');
            const close_popUp_login = document.getElementById('close_popUp_login');
    
            close_payment.addEventListener('click', ()=>{
                box_pesan.classList.remove('scale-100')
                box_pesan.classList.add('scale-0')
                setTimeout(()=>{
                    popup_pesan.classList.add('hidden')
                }, 300)
                
            })
    
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

            window.onload = () => {   
                checkbox.forEach(checkboxs => {
                    checkboxs.addEventListener('change', validasiFromLaporan); 
                });

                textarea.addEventListener('input', validasiFromLaporan)
                validasiFromLaporan(); 
            };

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
    
        }
        
        if(isLogin == "login"){
            const sudah_lapor = '<?= $sudah_lapor?>';
    
            if(!sudah_lapor == "belum"){
                window.onload = () => {   
                    checkbox.forEach(checkboxs => {
                        checkboxs.addEventListener('change', validasiFromLaporan); 
                    });
        
                    textarea.addEventListener('input', validasiFromLaporan);
                    validasiFromLaporan(); 
                };
            }
        }


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


    <script type="text/javascript">
        <?php if(isset($_SESSION['snapToken'])): ?>
        window.snap.embed('<?= $_SESSION['snapToken'] ?>', {
            embedId: 'snap-container'
        });
        <?php unset($_SESSION['snapToken']) ?>
        <?php endif; ?>
    </script>
</body>
<?php require "./views/Components/Foot.php"; ?>