<?php require "./views/Components/HeadKostPage.php"; ?>

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
                    <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Judul Kost</span>
                </div>
                </li>
            </ol>
        </div>
    </div>
    <div class="w-[90%] mx-auto pt-4 items-center" id="gambar">
        <div class="grid">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <img class="h-full" src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="">
                </div>

                <div class="grid grid-cols-2 gap-3 relative">
                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="">
                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="">
                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="">
                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="">

                    <a class="absolute bottom-3 right-3 bg-white text-black px-4 py-2 rounded shadow-lg duration-300 font-medium hover:bg-[#83493d] hover:text-white" href="/project_paw/pencari/reviewGambarKost">
                        Lihat semua foto
                    </a>
                </div>
            </div>
        </div>
        <div class="flex justify-between mt-4 pt-5">
            <div class="w-[63%]">
                <div class="grid gap-4 border-b border-gray-200">
                    <p class="text-4xl font-semibold">Griya kost Umi Sri</p>    
                    <div class="flex items-center">
                        <p class="p-2 border-2 border-gray-300 rounded flex items-center mr-4" >Kos Putra</p>
                        <i class="fa-solid fa-location-dot mr-2"></i>
                        <p>Telang Indah, Kamal</p>
                    </div>
                    <div class="flex items-center justify-between mb-7">
                        <div class="flex items-center">
                            <i class="fa-solid fa-bed mr-2"></i>
                            <p>Tersisa <span class="text-red-600 italic">5 Kamar</span></p>
                        </div>

                        <div class="flex gap-3">
                            <button id="favorit" class="p-2 border-2 border-gray-300 w-[110px] duration-300 rounded hover:opacity-70">
                                <i id="iconFavorit" class="fa-regular fa-heart"></i>
                                <span id="textFavorit">Simpan</span>
                            </button>

                            <button class="p-2 border-2 border-gray-300 w-[110px] duration-300 rounded hover:opacity-70">
                                <i class="fa-solid fa-share"></i>
                                Bagikan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-5 pb-5 border-b border-gray-200">
                    <p class="text-2xl">Kost dikelola oleh Rehan</p>
                    <img class="rounded-full w-16 cursor-pointer" src="https://i.pinimg.com/736x/91/0a/b5/910ab59abc5aed1805485ddc299a6a11.jpg" alt="">
                </div>
                <div class="flex flex-col gap-4 mt-5 pb-5 border-b border-gray-200">
                    <p class="text-3xl font-semibold">Fasilitas Kamar</p>
                    <div class="grid grid-cols-3">
                        <div>
                            <div class="flex items-center gap-3">
                                <img src="https://i.pinimg.com/736x/f2/f7/83/f2f783f4e4e7cd0558694a962b7f0872.jpg" alt="" style="width: 20px;">
                                <p>Tempat Tidur</p>
                            </div>
                            <div class="flex">
                                <p style="width: 53px;"></p>
                                <ul class="list-disc">
                                    <li>Kasur</li>
                                    <li>Bantal</li>
                                    <li>Guling</li>
                                    <li>Selimut</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-wind"></i>
                                <p>Sirkulasi Udara</p>
                            </div>
                            <div class="flex">
                                <p style="width: 50px;"></p>
                                <ul class="list-disc">
                                    <li>Jendela</li>
                                    <li>Ventilasi</li>
                                    <li>AC</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-couch"></i>
                                <p>Furniture</p>
                            </div>
                            <div class="flex">
                                <p style="width: 53px;"></p>
                                <ul class="list-disc">
                                    <li>Meja Belajar</li>
                                    <li>Kursi</li>
                                    <li>Lemari</li>
                                    <li>Lampu</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid gap-4 border-b border-gray-200 pb-10 mt-5">
                    <p class="text-3xl font-semibold">Fasilitas Kamar Mandi</p>
                    <div class="grid">
                        <div>
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-toilet"></i>
                                <p>Perlengkapan Di dalam Kamar Mandi</p>
                            </div>
                            <div class="flex">
                                <p style="width: 47px;"></p>
                                <ul class="list-disc">
                                    <li>Kamar Mandi Dalam</li>
                                    <li>Kloset Duduk</li>
                                    <li>Shower</li>
                                    <li>Wastafel</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid gap-4 border-b border-gray-200 pb-10 mt-5">
                    <p class="text-3xl font-semibold">Deskripsi Kost</p>
                    <div class="grid">
                        <p>Kost ini terdiri dari 2 lantai. Tipe kamar B berada di setiap lantainya dengan jendela menghadap ke arah koridor.</p>
                        <br>
                        <p>Waktu kunjungan survey yang tersedia adalah selama 24 jam.</p>
                        <br>
                        <p>Kost ini berlokasi 2 menit dari jalan raya dengan akses yang dapat dilalui oleh mobil, berlokasi 7 menit dari Stasiun Tanah Abang, 10 menit dari Universitas Trisakti, 9 menit dari Central Park, 13 menit dari Grand Indonesia, 10 menit dari Stasiun Palmerah, dan 15 menit dari Stasiun Karet.</p>
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
                    <p class="text-3xl font-semibold">3 Review</p>
                    <div class="grid gap-4 pt-4">
                        <div class="flex items-center gap-3 justify-between">
                            <div class="flex items-center gap-4">
                                <img class="rounded-full w-14" src="https://i.pinimg.com/736x/3f/7d/47/3f7d47db09ac055b9416d1cb3b1fa1df.jpg" alt="">
                                <div class="grid gap-0">
                                    <p class="font-semibold text-xl">Kevin</p>
                                    <p class="text-sm">2024-12-05 16:23</p>
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
                            <p class="mb-5">Kost very good nyaman dan tenang, pemilik kost juga ramah</p>
                            <div class="grid gap-3 p-4 bg-gray-200">
                                <p class="font-semibold">Respon Pemilik Kos : </p>
                                <p>Halo, Kakak. Terima kasih atas reviewnya. Semoga Anda selalu betah untuk singgah di kost kami :)</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-4 pt-4">
                        <div class="flex items-center gap-3 justify-between">
                            <div class="flex items-center gap-4">
                                <img class="rounded-full w-14" src="https://i.pinimg.com/736x/6c/eb/8e/6ceb8ea125df3a7f1a3421fe4e4e49c8.jpg" alt="">
                                <div class="grid gap-0">
                                    <p class="font-semibold text-xl">Windah Basudara <i class="fa-solid fa-circle-check" style="color: #5db8fd;"></i></p>
                                    <p class="text-sm">2024-11-19 11:46</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button id="suka_ulasan2" class="text-xl">
                                    <i class="fa-regular fa-thumbs-up" id="icon_sukaUlasan2"></i>
                                </button>
                                <p class="text-lg mt-1">23</p>
                            </div>
                        </div>
                        <div>
                            <p class="mb-5">Kostnya tenang dan aman mantap lah buat streaming hehe</p>
                            <div class="grid gap-3 p-4 bg-gray-200">
                                <p class="font-semibold">Respon Pemilik Kos : </p>
                                <p>Wah Terima kasih atas reviewnya kak windah. Semoga selalu betah untuk singgah di kost kami ya :)</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-4 pt-4">
                        <div class="flex items-center gap-3 justify-between">
                            <div class="flex items-center gap-4">
                                <img class="rounded-full w-14" src="https://i.pinimg.com/736x/13/b4/08/13b408f0ad453542c0d8fa8e62602245.jpg" alt="">
                                <div class="grid gap-0">
                                    <p class="font-semibold text-xl">Danendra</p>
                                    <p class="text-sm">2024-11-03 20:55</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button id="suka_ulasan2" class="text-xl">
                                    <i class="fa-regular fa-thumbs-up" id="icon_sukaUlasan2"></i>
                                </button>
                                <p class="text-lg mt-1">7</p>
                            </div>
                        </div>
                        <div>
                            <p class="mb-5">Kostnya oke sih cuman dengan harga 100k per bulan harusnya wifinya agak kenceng dikit sih soalnya agak lemot, overall okee </p>
                            <div class="grid gap-3 p-4 bg-gray-200">
                                <p class="font-semibold">Respon Pemilik Kos : </p>
                                <p>Hallo kakak, Terima Kasih atas reviewnya. Dengan kost harga 100k /bulan wifi dengan kecepatan 10Gb/s menurut kami sudah lebih dari cukup ya :)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tableView" class="bg-white rounded-md" style="width: 400px; box-shadow: 1px 0px 40px -17px rgba(0,0,0,0.68); height: 280px; top: 110px; right: 5%;">
                <div class="flex flex-col p-4">
                    <div > 
                        <p class="text-lg font-normal">Harga</p>
                        <p class="font-semibold text-2xl">Rp100.000 /Bulan</p>
                    </div>  
                    <div class="space-y-3 w-full" style="margin-top: 45px;">
                        <a href="/project_paw/pencari/chat" class="border-2 p-2 rounded px-3 w-full flex items-center justify-center chat">
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
        </div>
    </div>
    <?php require './views/Components/FooterHomepage.php' ?>
    <div id="report" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-1/3 transition-all duration-300 transform scale-0" id="contain_report">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Laporkan Kost</h2>
                <button class="text-gray-700 hover:opacity-70" id="close_report">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="" class="grid gap-5">
                <div class="grid gap-4">
                    <div class="pt-4 w-full max-w-md">
                        <section class="flex items-center mb-4">
                        <input type="checkbox" name="foto" value="foto" id="foto" class="w-4 h-4 border-gray-300 rounded focus:ring-2">
                        <label for="foto" class="ml-2 text-gray-700">Foto yang di berikan tidak sesuai</label>
                        </section>
                        <section class="flex items-center mb-4">
                        <input type="checkbox" name="alamat" value="alamat" id="alamat" class="w-4 h-4 border-gray-300 rounded focus:ring-2">
                        <label for="alamat" class="ml-2 text-gray-700">Alamat yang di berikan tidak sesuai</label>
                        </section>
                        <section class="flex items-center mb-4">
                        <input type="checkbox" name="harga" value="harga" id="harga" class="w-4 h-4 border-gray-300 rounded focus:ring-2">
                        <label for="harga" class="ml-2 text-gray-700">Harga tidak sesuai</label>
                        </section>
                        <section class="flex items-center mb-4">
                        <input type="checkbox" name="fasilitas" value="fasilitas" id="fasilitas" class="w-4 h-4 border-gray-300 rounded focus:ring-2">
                        <label for="fasilitas" class="ml-2 text-gray-700">Fasilitas yang di berikan tidak sesuai</label>
                        </section>
                        <section class="flex items-center mb-4">
                        <input type="checkbox" name="lainnya" value="lainnya" id="lainnya" class="w-4 h-4 border-gray-300 rounded focus:ring-2">
                        <label for="lainnya" class="ml-2 text-gray-700">Lainnya</label>
                        </section>
                    </div>
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
    

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        const tombolFavorit = document.getElementById('favorit')
        const textFavorit = document.getElementById('textFavorit')
        const iconFavorit = document.getElementById('iconFavorit')
        const gambar = document.getElementById('gambar')
        const tableView = document.getElementById('tableView')
        const suka_ulasan = document.getElementById('suka_ulasan')
        const icon_sukaUlasan = document.getElementById('icon_sukaUlasan')
        

        window.addEventListener('scroll', () => {
            const rect = gambar.getBoundingClientRect();
            const initialRect = tableView.getBoundingClientRect().top;
            console.log("top", initialRect)
            console.log(rect.bottom)
            if (rect.bottom <= 2660.6875 && rect.bottom > 389.6875) {
                tableView.classList.add('fixed');
            } else if (rect.bottom <= 389.6875) {
                tableView.classList.remove('fixed');
                tableView.classList.add('self-end')
            } else {
                tableView.classList.remove('self-end')
                tableView.classList.remove('fixed');
            }
        });


        tombolFavorit.addEventListener('click', ()=>{
            if(iconFavorit.classList.contains('fa-regular')){
                tombolFavorit.classList.remove('w-[110px]')
                tombolFavorit.classList.add('w-[125px]')
                iconFavorit.classList.remove('fa-regular')
                iconFavorit.classList.add('fa-solid', 'text-red-600')
                textFavorit.textContent = 'Disimpan'
            } else {
                tombolFavorit.classList.remove('w-[125px]')
                tombolFavorit.classList.add('w-[110px]')
                iconFavorit.classList.remove('fa-solid', 'text-red-600')
                iconFavorit.classList.add('fa-regular')
                textFavorit.textContent = 'Simpan'
            }
        })

        suka_ulasan.addEventListener('click', ()=>{
            if(icon_sukaUlasan.classList.contains('fa-regular')){
                icon_sukaUlasan.classList.remove('fa-regular', 'fa-thumbs-up')
                icon_sukaUlasan.classList.add('fa-solid', 'fa-thumbs-up')
            } else {
                icon_sukaUlasan.classList.remove('fa-solid', 'fa-thumbs-up')
                icon_sukaUlasan.classList.add('fa-regular', 'fa-thumbs-up')
            }
        })

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

    </script>
</body>
<?php require "./views/Components/Foot.php"; ?>