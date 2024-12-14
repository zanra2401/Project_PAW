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
                <div class="p-6 text-center" id="profile_title">
                    <p class="text-2xl font-semibold">Profile</p>
                </div>
                <div class="p-6 text-center hidden" id="profile_pemesanan">
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

                <div class="container p-10 border-t border-grey grid gap-5 hidden" id="content_pemesanan">
                    <!-- Search Bar -->
                    <div class="flex items-center gap-4">
                        <label class="block font-medium text-gray-700 text-center text-xl">Cari nama kost</label>
                        <input type="text" id="searchInput"
                        class="block w-fit px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm"
                        placeholder="Masukkan nama kost...">
                    </div>
    
                    <div id="bookingCards" class="mt-8 grid grid-cols-2 gap-5">
                        <div class="bg-gray-100 shadow-lg rounded-lg p-3 text-sm grid gap-3" data-location="Surabaya">
                            <h2 class="text-2xl font-bold text-gray-800">Kosan Mawar</h2>
                            <p class="text-lg text-gray-600">ID Kost : 001</p>
                            <p class="text-lg text-gray-600">Lokasi : Surabaya</p>
                            <p class="text-lg text-gray-600">Harga : Rp 1,500,000</p>
                            <p class="text-lg text-gray-600">Tanggal Pemesanan : 2024-01-15</p>
                            <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-lg"
                                style="background-color: #68422d;">Review</button>

                        </div>

                        <div class="bg-gray-100 shadow-lg rounded-lg p-3 text-sm grid gap-3" data-location="Malang">
                            <h2 class="text-2xl font-bold text-gray-800">Kosan Melati</h2>
                            <p class="text-lg text-gray-600">ID Kost: 002</p>
                            <p class="text-lg text-gray-600">Lokasi: Malang</p>
                            <p class="text-lg text-gray-600">Harga: Rp 1,200,000</p>
                            <p class="text-lg text-gray-600">Tanggal Pemesanan: 2024-02-10</p>
                            <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-lg"
                                style="background-color: #68422d;">Review</button>

                        </div>

                        <div class="bg-gray-100 shadow-lg rounded-lg p-3 text-sm grid gap-3" data-location="Surabaya">
                            <h2 class="text-2xl font-bold text-gray-800">Kosan Dahlia</h2>
                            <p class="text-lg text-gray-600">ID Kost: 003</p>
                            <p class="text-lg text-gray-600">Lokasi: Surabaya</p>
                            <p class="text-lg text-gray-600">Harga: Rp 1,000,000</p>
                            <p class="text-lg text-gray-600">Tanggal Pemesanan: 2024-03-05</p>
                            <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-lg"
                                style="background-color: #68422d;">Review</button>

                        </div>
                        <div class="bg-gray-100 shadow-md rounded-lg p-3 text-sm grid gap-3" data-location="Surabaya">
                            <h2 class="text-2xl font-bold text-gray-800">Griya Danendra</h2>
                            <p class="text-lg text-gray-600">ID Kost: 005</p>
                            <p class="text-lg text-gray-600">Lokasi: Jakarta Selatan</p>
                            <p class="text-lg text-gray-600">Harga: Rp 5,000,000,000</p>
                            <p class="text-lg text-gray-600">Tanggal Pemesanan: 2024-12-05</p>
                            <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-lg"
                                style="background-color: #68422d;">Review</button>

                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <script>
        const menuju_profile = document.getElementById('menuju_profile')
        const menuju_pengajuan = document.getElementById('menuju_pengajuan')
        const profile_title = document.getElementById('profile_title')
        const pemesanan_title = document.getElementById('profile_pemesanan')
        const content_profile = document.getElementById('content_profle')
        const content_pengajuan = document.getElementById('content_pemesanan')

        menuju_profile.addEventListener('click', ()=>{
            console.log("kontol")
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