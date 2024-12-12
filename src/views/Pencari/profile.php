<?php require './views/Components/Head.php' ?>

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
                            <a href="" class="flex items-center gap-5">
                                <i class="fa-regular fa-user"></i>
                                <p class="font-medium">Profile</p>
                            </a>
                        </div>
                        <div class="flex items-center gap-5">
                            <a href="" class="flex items-center gap-5">
                                <i class="fa-solid fa-receipt"></i>
                                <p class="font-medium">Riwayat pengajuan sewa</p>
                            </a>
                        </div>
                        <!-- <div class="flex items-center gap-5">
                            <a href="" class="flex items-center gap-5">
                                <i class="fa-solid fa-gear"></i>
                                <p class="font-medium">Pengaturan</p>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="p-6 text-center">
                    <p class="text-2xl font-semibold">Profile</p>
                </div>
                <div class="p-10 border-t border-grey grid gap-5">
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
                        class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                    >
                    <label for="username" class="text-xl font-medium text-zinc-400">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        placeholder="Masukan username.." 
                        class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
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
                    <label for="pekerjaan" class="text-xl font-medium text-zinc-400">Pekerjaan</label>
                    <select name="pekerjaan" id="pekerjaan" class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 hover:cursor-pointer">
                        <option value="" disabled selected>Pilih pekerjaan</option>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="karyawan">Karyawan</option>
                        <option value="lainnya">Linnya</option>
                    </select>

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
    <script>
        const pp = document.getElementById('pp')
        const pp_menu = document.getElementById('menu_pp')
        const provinsi = document.getElementById("provinsi")
        const kota = document.getElementById("kota")

        pp.addEventListener('click', ()=>{
            if (pp_menu.classList.contains('hidden')){
                console.log("oioio")
                pp_menu.classList.remove('hidden')
            } else {
                pp_menu.classList.add('hidden')
            }
        }) 

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