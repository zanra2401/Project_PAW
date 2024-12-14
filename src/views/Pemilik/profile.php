<?php require './views/Components/Head.php' ?>

<body class="bg-gray-100 flex overflow-hidden">
    <?php require "./views/Components/sidebarPemilik.php" ?>

    <main class="overflow-scroll w-screen h-screen pb-10 p-5 flex-1">
        <span class="mb-3 font-Roboto-medium h-10 text-gray-600"> <i class="fas fa-user"></i> <a href="">Kost</a> <i class="fas fa-chevron-right mr-2"></i></span>
        <div class="bg-white mt-5 rounded-xl mx-auto shadow-lg">
            <div class="flex">
                <div class="w-full">
                    <div class=" text-center hidden" id="profile_pemesanan">
                        <p class="text-2xl font-semibold">Riwayat Pemesanan</p>
                    </div>
                    <div class="p-10 border-t border-grey grid gap-5" id="content_profle">
                        <p class="text-xl font-medium text-zinc-400">Profile Picture</p>
                        <form action="" class="grid gap-5">
                        <div class="flex items-center gap-7">
                            <img src="https://i.pinimg.com/736x/dd/1a/d5/dd1ad561fbf608248bec0a3e2539ff89.jpg" alt="profile" class="border-2 w-40 rounded-full">
                            <div class="flex gap-3">
                                <button class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-600 transition">
                                    Change Picture
                                </button>
                                <button class="px-4 py-2 bg-red-500 text-white font-bold rounded hover:bg-red-600 transition">
                                    Delete Picture
                                </button>
                            </div>
                        </div>
                        <label for="nama" class="text-xl font-medium text-zinc-400">Nama Lengkap</label>
                        <input 
                            type="text" 
                            id="nama_lengkap" 
                            placeholder="Masukan nama lengkap.." 
                            class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2",
                            value=
                        >
                        <label for="username" class="text-xl font-medium text-zinc-400">Username</label>
                        <input 
                            type="text" 
                            id="username" 
                            placeholder="Masukan username.." 
                            class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2",
                            value="<?= $data["user"]["username_user"] ?>"
                        >
                        <label for="gender" class="text-xl font-medium text-zinc-400">Jenis Kelamin</label>
                        <select name="kelamin" id="kelamin" class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 hover:cursor-pointer">
                            <option value="" disabled selected>Pilih jenis kelamin</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
    
                        <label for="tgl_lahir" class="text-xl font-medium text-zinc-400">Tanggal Lahir</label>
                        <input 
                            type="date" 
                            id="date-input" 
                            class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 text-gray-700 hover:cursor-pointer"
                        >
                        </form>
    
                        <p class="text-xl font-medium text-zinc-400">Provinsi dan Kab/Kota asal</p>
                        
                        <label for="alamat" class="text-lg font-medium text-zinc-400">Pilih Provinsi :</label>
                        <select id="provinsi" class="form-control px-4 py-2 border border-gray-300 rounded hover:cursor-pointer">
                            
                        </select>
    
                        <label for="kota" class="text-lg font-medium text-zinc-400">Pilih Kab/Kota :</label>
                        <select id="kota" class="form-control px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 hover:cursor-pointer">
                        </select>
    
                        <div class="flex justify-end">
                            <button type="submit" name="simpan" class="mt-5 bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                                Save Change
                            </button>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </main>

    <script>
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
            .then(response => response.json())
            .then(provinces => {
                provinces.forEach(element => {
                    provinsi.innerHTML += `<option value='${element["id"]}'>${element["name"]}</option>`
                });
            });

        
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/11.json`)
            .then(response => response.json())
            .then(kotas => {
                kotas.forEach(element => {
                    kota.innerHTML += `<option value='${element["id"]}'>${element["name"]}</option>`
                })
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