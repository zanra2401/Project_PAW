<?php 
    require './views/Components/Head.php';
    $data_provinsi = $data['data_user'][0]['provinsi_user'];
    $data_kota = $data['data_user'][0]['kota_user'];

    $foto_profile = $data['data_user'][0]['profile_user'];

    function formatRupiah($angka) {
        $angka = (float) $angka;
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }

    $data_review = $data['riwayat'];


?>  

<body class="bg-gray-100">
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
                    <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Profile</span>
                </div>
                </li>
            </ol>
        </div>
    </div>
    <div class="bg-white w-[90%] rounded-xl mx-auto shadow-lg mb-10">
        <div class="flex">
            <div class="border-r border-grey w-[288px]">
                <p class="p-6 text-2xl font-semibold">Menu</p>
                <div class="border-t border-r border-grey w-[288px]">
                    <div class="grid p-6 gap-4">
                        <div class="flex items-center gap-5">
                            <button class="flex items-center gap-5" id="menuju_profile">
                                <i class="fa-regular fa-user"></i>
                                <p class="font-medium">Profile</p>
                            </button>
                        </div>
                        <div class="flex items-center gap-5">
                            <button class="flex items-center gap-5" id="menuju_pengajuan">
                                <i class="fa-solid fa-receipt"></i>
                                <p class="font-medium">Riwayat pengajuan sewa</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="p-6 text-center" id="profile_title">
                    <p class="text-2xl font-semibold">Profile</p>
                </div>
                <div class="p-6 text-center hidden" id="profile_pemesanan">
                    <p class="text-2xl font-semibold">Riwayat Pemesanan</p>
                </div>
                <div class="p-10 border-t border-grey grid gap-5" id="content_profle">
                    <div class="mx-auto flex gap-3 items-center p-3 border border-gray-300 rounded-md mb-5">
                        <i class="fa-solid fa-circle-exclamation text-lg" style="color: #74C0FC;"></i>
                        <h1 class="text-sm ">Jangan lupa klik tombol <span class="text-red-600 italic">Save Changes</span> ketika update data</h1>
                    </div>
                    <p class="text-xl font-medium text-zinc-400">Profile Picture</p>
                    <form action="/<?= PROJECT_NAME ?>/Pencari/profile" class="grid gap-5" method="POST" enctype="multipart/form-data" id="edit_profile">
                        <div class="flex items-center gap-7">
                            <img src="<?= "/" . PROJECT_NAME . "/" . $foto_profile?>" alt="profile" class="border-2 w-40 h-40 overflow-hidden rounded-full" id="profile-picture">
                            <div class="flex gap-3">
                                <button type="button" class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-600 transition" onclick="document.getElementById('file-input').click()">
                                    Change Picture
                                </button>
                                <input type="file" name="ubah_gambar" id="file-input" style="display:none" accept="image/*" onchange="changeProfilePicture(event)">
                                <button type="button" class="px-4 py-2 bg-red-500 text-white font-bold rounded hover:bg-red-600 transition" onclick="deleteProfilePicture(event)">
                                    Delete Picture
                                </button>
                            </div>
                        </div>
                        <p class="text-red-600"><?= isset($data['eror']['foto_profile'])? $data['eror']['foto_profile']: ''?></p>
                        <label for="nama" class="text-xl font-medium text-zinc-400">Nama Lengkap</label>
                        <input 
                            name="nama_lengkap"
                            type="text" 
                            id="nama_lengkap" 
                            placeholder="Masukan nama lengkap.." 
                            class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                            value="<?=isset($_POST["nama_lengkap"])? $_POST["nama_lengkap"] : $data['data_user'][0]['nama_user']?>"
                        >
                        <p class="text-red-600"><?= isset($data['eror']['fullname'])? $data['eror']['fullname']: ''?></p>
                        <label for="username" class="text-xl font-medium text-zinc-400">Username</label>
                        <input 
                            name="username"
                            type="text" 
                            id="username" 
                            placeholder="Masukan username.." 
                            class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                            value="<?= isset($_POST["username"])? $_POST["username"] : $data['data_user'][0]['username_user']?>"
                        >
                        <p class="text-red-600"><?= isset($data['eror']['username'])? $data['eror']['username']: ''?></p>
                        <label for="kelamin" class="text-xl font-medium text-zinc-400">Jenis Kelamin</label>
                        <select name="kelamin" id="kelamin" class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 hover:cursor-pointer">
                            <option value="1" <?= isset($data['data_user'][0]['jenis_kelamin_user'])?'': 'selected' ?> disabled>Pilih gender</option>
                            <option value="Laki-laki" <?= $data['data_user'][0]['jenis_kelamin_user'] == 'Laki-laki'? 'selected':''; ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $data['data_user'][0]['jenis_kelamin_user'] == 'Perempuan'? 'selected':''; ?>>Perempuan</option>
                        </select>

                        <label for="email" class="text-xl font-medium text-zinc-400">Email</label>
                        <input 
                            name="email"
                            type="text" 
                            id="email" 
                            placeholder="Masukan email...." 
                            class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                            value="<?= isset($_POST["email"])? $_POST["email"] : $data['data_user'][0]['email_user']?>"
                        >
                        <p class="text-red-600"><?= isset($data['eror']['email'])? $data['eror']['email']: ''?></p>
                        <label for="no_hp" class="text-xl font-medium text-zinc-400">Nomor HP</label>
                        <input 
                            name="no_hp"
                            type="text" 
                            id="no_hp" 
                            placeholder="Masukan No HP..." 
                            class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                            value="<?=isset($_POST["no_hp"])? $_POST["no_hp"] : $data['data_user'][0]['no_HP_user']?>"
                        >
                        <p class="text-red-600"><?= isset($data['eror']['hp'])? $data['eror']['hp']: ''?></p>
                        <p class="text-xl font-medium text-zinc-400">Provinsi dan Kab/Kota asal</p>
                        
                        <label for="alamat" class="text-lg font-medium text-zinc-400">Pilih Provinsi :</label>
                        <select id="provinsi" class="form-control px-4 py-2 border border-gray-300 rounded hover:cursor-pointer" name="provinsi">
                            
                        </select>

                        <label for="kota" class="text-lg font-medium text-zinc-400">Pilih Kab/Kota :</label>
                        <select id="kota" class="form-control px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 hover:cursor-pointer" name="kota">
                        </select>

                        <div class="flex justify-end">
                            <button type="submit" name="simpan" class="mt-5 bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <div class="container p-10 border-t border-grey grid gap-5 hidden" id="content_pemesanan">
                    <!-- Search Bar -->
                    <div class="flex items-center gap-4">
                        <label class="block font-medium text-gray-700 text-center text-xl">Cari nama kost</label>
                        <input type="text" id="searchInput"
                        class="block w-fit px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm"
                        placeholder="Masukkan nama kost...">
                    </div>
                    
                    <div id="bookingCards" class="mt-8 grid grid-cols-2 gap-5">
                        <?php 
                            $temp = 1;
                            foreach ($data['riwayat'] AS $rit){
                                $harga = formatRupiah($rit['harga_kost']);
                                $path = "/" . PROJECT_NAME . "/";
                                $gambar = $path . $rit['gambar_kost'];
                                echo <<<EDO
                                    <div class="bg-gray-100 shadow-lg rounded-lg p-3 text-sm grid gap-3">
                                        <h2 class="text-2xl font-bold text-gray-800">{$rit['nama_kost']}</h2>
                                        <img src="{$gambar}" alt="gambar_kost" class="w-full h-[180px] object-cover">
                                        <p class="text-lg text-gray-600">Harga : {$harga}</p>
                                        <p class="text-lg text-gray-600">Tanggal Pemesanan : 2024-01-15</p>
                                EDO;
                                if($rit['status'] == 'belum'){
                                    echo <<<EDO
                                        <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-lg"
                                            style="background-color: #68422d;" onclick="pop_review($temp)">Review
                                        </button>
                                    EDO;
                                } else {
                                    echo <<<EDO
                                        <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-lg bg-[#68422d] cursor-not-allowed opacity-50" disabled>
                                            Sudah Direview
                                        </button>
                                    EDO;

                                }
                                echo <<<EDO
                                        <input type="hidden" id="review_{$temp}" value="{$gambar}">
                                        <input type="hidden" id="IdKost_review_{$temp}" value="{$rit['id_kost']}">
                                    </div>
                                EDO;

                                $temp += 1;
                            }   
                       ?>
                    </div>
                </div> 
                <div id="popup_review" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <!-- Pop-up Content -->
                    <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full p-6 grid gap-3 transition-all duration-300 transform scale-0" id="box_review">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Review Kost abc</h2>
                        <form action="/<?= PROJECT_NAME ?>/Pencari/profile" class="grid gap-5" method="POST" id="form_review">
                            <div class="flex gap-4">
                                <img src="<?= "/". PROJECT_NAME . "/"?>public/storage/gambarKost/6767b32487624_713_302746617.jpg" alt="" class="w-1/2 h-[240px]" id="img_review_pop">
                                <textarea
                                    name="reviewTextarea"
                                    id="reviewTextarea"
                                    class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-base-color focus:border-base-color text-gray-700 resize-none"
                                    placeholder="Tulis review anda tentang kost ini..."
                                ></textarea>

                            </div>
                            <div class="flex flex-col space-y-4">
                                <button 
                                    id="offlineButton" 
                                    class="bg-gray-600 text-white font-semibold px-4 py-2 rounded hover:opacity-80 transition disabled:bg-gray-400 disabled:cursor-not-allowed" 
                                    type="submit" 
                                    disabled
                                >
                                    Kirim
                                </button>
                                <button 
                                    id="closeButton" 
                                    class="mt-6 text-gray-500 hover:text-gray-800 text-sm font-semibold" 
                                    type="button"
                                >
                                    Batalkan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
            <div id="contact-list" class="p-2 w-[99%] ">    
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

        const reviewTextarea = document.getElementById('reviewTextarea');
        const submitButton = document.getElementById('offlineButton');

        function checkTextarea() {
            if (reviewTextarea.value.length < 5) {
                submitButton.disabled = true;  
            } else {
                submitButton.disabled = false;  
            }
        }

        reviewTextarea.addEventListener('input', checkTextarea);

        checkTextarea();

        const popup_review = document.getElementById('popup_review');
        const closeButton = document.getElementById('closeButton');
        const box_review = document.getElementById('box_review');
        
        function pop_review(id){
            const img_review_pop = document.getElementById('img_review_pop');
            const review_img = document.getElementById(`review_${id}`).value;
            img_review_pop.src = review_img;
            popup_review.classList.remove('hidden')

            const IdKost_review = document.getElementById(`IdKost_review_${id}`).value
            const form_review = document.getElementById('form_review');

            const id_kosti = document.createElement('input');
            id_kosti.type = 'hidden'
            id_kosti.name = 'id_kostnya'
            id_kosti.id = 'id_kosty'
            id_kosti.value = IdKost_review

            form_review.appendChild(id_kosti)
            
            setTimeout(()=>{
                box_review.classList.remove('scale-0')
                box_review.classList.add('scale-100')
            }, 50)
        }


        closeButton.addEventListener('click', ()=>{
            const id_kosty = document.getElementById('id_kosty');
            id_kosty.remove();
            box_review.classList.remove('scale-100')
            box_review.classList.add('scale-0')
            setTimeout(()=>{
                popup_review.classList.add('hidden')
            }, 300)
            
        })

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

        function changeProfilePicture(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const profilePic = document.getElementById('profile-picture');
                profilePic.src = e.target.result; 
            };

            if (file) {
                reader.readAsDataURL(file); 
            }

            const input_default = document.getElementById('isi_default_pp');
            if (input_default){
                input_default.remove();
            }
        }

        function deleteProfilePicture(event) {
            const profilePic = document.getElementById('profile-picture');
            profilePic.src = '/Project_PAW/public/storage/gambarProfile/pp-default.png'; 

            const edit_profile = document.getElementById('edit_profile');

            const input_default = document.getElementById('isi_default_pp');
            const abc = document.getElementById('file-input')

            abc.value = '';
            if (input_default) {
                input_default.value = '/public/storage/gambarProfile/pp-default.png';
            } else {
                const new_input = document.createElement('input');
                new_input.name = 'pp_default';
                new_input.type = 'text';
                new_input.id = 'isi_default_pp'
                new_input.value = '/public/storage/gambarProfile/pp-default.png';
                new_input.style.display = 'none';
    
                edit_profile.appendChild(new_input);
            }
        }

        const menuju_profile = document.getElementById('menuju_profile')
        const menuju_pengajuan = document.getElementById('menuju_pengajuan')
        const profile_title = document.getElementById('profile_title')
        const pemesanan_title = document.getElementById('profile_pemesanan')
        const content_profile = document.getElementById('content_profle')
        const content_pengajuan = document.getElementById('content_pemesanan')

        menuju_profile.addEventListener('click', ()=>{
            if (profile_title.classList.contains('hidden') && content_profile.classList.contains('hidden')){
                profile_title.classList.remove('hidden')
                content_profile.classList.remove('hidden')
                pemesanan_title.classList.add('hidden')
                content_pengajuan.classList.add('hidden')
            } else {
                if (!content_profile.contains('hidden')){
                    profile_title.classList.add('hidden')
                    content_profile.classList.add('hidden')
                }
            }
        })

        menuju_pengajuan.addEventListener('click', ()=>{
            if (pemesanan_title.classList.contains('hidden') && content_pengajuan.classList.contains('hidden')){
                pemesanan_title.classList.remove('hidden')
                content_pengajuan.classList.remove('hidden')
                profile_title.classList.add('hidden')
                content_profile.classList.add('hidden')
            } else {
                if (!content_pengajuan.contains('hidden')){
                    pemesanan_title.classList.add('hidden')
                    content_pengajuan.classList.add('hidden')
                }
            }
        })

        const provinsi = document.getElementById("provinsi")
        const kota = document.getElementById("kota")

        const searchInput = document.getElementById("searchInput");
        const bookingCards = document.querySelectorAll("#bookingCards > div");

        searchInput.addEventListener("input", function() {
            const searchQuery = this.value.toLowerCase();
            bookingCards.forEach(card => {
                const kostName = card.querySelector("h2").textContent.toLowerCase();
                const matchesSearch = kostName.includes(searchQuery);
                card.style.display = matchesSearch ? "block" : "none";
            });
        });

        let data_provinsi = <?= $data_provinsi;?>;
        let data_kota = <?= $data_kota;?>;

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
            .then(response => response.json())
            .then(provinces => {
                provinces.forEach(element => {
                    provinsi.innerHTML += `<option value='${element["id"]}'>${element["name"]}</option>`
                }); 

                if (data_provinsi < 11){
                    data_provinsi = 11
                }

                provinsi.value = data_provinsi;
                
            });
        
        if (data_provinsi < 11){
            data_provinsi = 11
        }
            
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${data_provinsi}.json`)
            .then(response => response.json())
            .then(kotas => {
                kotas.forEach(element => {
                    kota.innerHTML += `<option value='${element["id"]}'>${element["name"]}</option>`
                })

                if (data_kota == 0){
                    data_kota = 1101
                }

                kota.value = data_kota  
            });
    

        provinsi.addEventListener('change', ()=>{
            kota.innerHTML = ""
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsi.value}.json`)
            .then(response => response.json())
            .then(kotas => {
                kotas.forEach(element => {
                    kota.innerHTML += `<option value='${element["id"]}'>${element["name"]}</option>`
                })
            });
        })

    </script>
</body>