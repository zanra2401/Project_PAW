<?php 
    require './views/Components/Head.php';
    $data_provinsi = $data['data_user'][0]['provinsi_user'];
    $data_kota = $data['data_user'][0]['kota_user'];

    $foto_profile = $data['data_user'][0]['profile_user'];
    
?>


<body class="bg-gray-100 flex overflow-hidden">
    <?php require "./views/Components/sidebarPemilik.php" ?>

    <main class="overflow-scroll w-screen h-screen pb-10 p-5 flex-1">
        <span class="mb-3 font-Roboto-medium h-10 text-gray-600"> <i class="fas fa-user"></i> <a href="">Kost</a> <i class="fas fa-chevron-right mr-2"></i></span>
        <div class="bg-white mt-5 rounded-xl mx-auto shadow-lg">
            <div class="flex">
                <div class="w-full">
                    <div class="p-10 border-t border-grey grid gap-5" id="content_profle">
                        <div class="mx-auto flex gap-3 items-center p-3 border border-gray-300 rounded-md mb-5">
                            <i class="fa-solid fa-circle-exclamation text-lg" style="color: #74C0FC;"></i>
                            <h1 class="text-sm ">Jangan lupa klik tombol <span class="text-red-600 italic">Save Changes</span> ketika update data</h1>
                        </div>
                        <p class="text-xl font-medium text-zinc-400">Profile Picture</p>
                        <form action="/<?= PROJECT_NAME ?>/Pemilik/profile" class="grid gap-5" method="POST" enctype="multipart/form-data" id="edit_profile">
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
                                <option value="1" <?= isset($data['data_user'][0]['username_user'])?'': 'selected' ?> disabled>Pilih gender</option>
                                <option value="Laki-laki" <?= $data['data_user'][0]['username_user'] == 'Laki-laki'? 'selected':''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= $data['data_user'][0]['username_user'] == 'Perempuan'? 'selected':''; ?>>Perempuan</option>
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
                </div>
            </div>
        </div>
    </main>

    <script>

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
            profilePic.src = '/Project_PAW/public/storage/gambarProfile/pp_kosong.jpeg'; 

            const edit_profile = document.getElementById('edit_profile');

            const input_default = document.getElementById('isi_default_pp');
            const abc = document.getElementById('file-input')

            abc.value = '';
            if (input_default) {
                input_default.value = '/public/storage/gambarProfile/pp_kosong.jpeg';
            } else {
                const new_input = document.createElement('input');
                new_input.name = 'pp_default';
                new_input.type = 'text';
                new_input.id = 'isi_default_pp'
                new_input.value = '/public/storage/gambarProfile/pp_kosong.jpeg';
                new_input.style.display = 'none';
    
                edit_profile.appendChild(new_input);
            }
        }

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