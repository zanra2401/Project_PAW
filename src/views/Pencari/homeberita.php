<?php 
    require './views/Components/Head.php';
    $data_berita = $data['data_berita'];

?>
<body class="bg-gray-100">
    <?php require "./views/Components/NavBar.php" ?> 

    <div class="w-[90%] mx-auto pt-4 h-16 items-center bg-gray-100">
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
                    <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2 dark:text-gray-400">Berita</span>
                </div>
                </li>
            </ol>
        </div>
    </div>
    <div class="mx-auto w-[90%] bg-gray-100">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Berita Utama</h2>
        <div id="default-carousel" class="relative h-[600px]" data-carousel="slide">
            <div class="relative h-full w-full overflow-hidden rounded-lg">
            <?php 
            foreach($data_berita as $dat){
                $full_description = $dat['deskripsi_berita'];

                // Batasi deskripsi hanya beberapa kata (misalnya 20 kata)
                $words = explode(' ', $full_description); // Pisahkan menjadi array kata
                $short_description = implode(' ', array_slice($words, 0, 30)); // Ambil 20 kata pertama

                // Tambahkan tanda "..." jika deskripsi lebih panjang dari 20 kata
                if (count($words) > 30) {
                    $short_description .= '...';
                echo <<< EDO
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{$dat['gambar_berita']}" class="w-full h-full object-cover" alt="...">
                        <a class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center bg-black bg-opacity-50 text-white p-6" href="/project_paw/pencari/isiberita/{$dat['id_berita']}">
                            <div class="text-left pt-80">
                                <h1 class="text-2xl font-bold mb-2 hover:underline">{$dat['judul_berita']}</h1>
                                <p class="font-medium">
                                    {$short_description}
                                </p>
                            </div>
                        </a>
                    </div>

                EDO;
            }
        }
            ?>
                
                <!-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://img-cdn.medkomtek.com/kLuDpHQs7teHMHqymx-Welh8TNQ=/730x411/smart/filters:quality(100):format(webp)/article/IRZLtNKeQMmdTel1M1KZP/original/019628000_1597821376-Tips-Mudah-Hidup-Sehat-untuk-Anak-Kost-yang-Jauh-dari-Orang-Tua-shutterstock_768948793.jpg?w=256&q=100" 
                        class="w-full h-full object-cover" alt="...">
                    <a class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center bg-black bg-opacity-50 text-white p-6" href="#">
                        <div class="text-left pt-80">
                            <h1 class="text-2xl font-bold mb-2 hover:underline">Tips Mudah Hidup Sehat untuk Anak Kost yang Jauh dari Orang Tua</h1>
                            <p class="font-medium">
                                Karena kesibukan dan mengurus segala sesuatunya sendiri, kesehatan tubuh terkadang dilupakan. 
                                Lantas, bagaimana caranya agar tubuh tetap sehat tapi tidak ribet? Anak kost, yuk, simak tipsnya!
                            </p>
                        </div>
                    </a>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://akcdn.detik.net.id/community/media/visual/2023/08/12/ilustrasi-rumah-kos-freepik_169.jpeg?w=700&q=90" 
                        class="w-full h-full object-cover" alt="...">
                    <a class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center bg-black bg-opacity-50 text-white p-6" href="#">
                        <div class="text-left pt-80">
                            <h1 class="text-2xl font-bold mb-2 hover:underline">15 Barang yang Wajib Kamu Punya di Kos</h1>
                            <p class="font-medium">
                                Nah, buat kamu yang masih bingung untuk menentukan barang apa saja yang diperlukan dan wajib ada untuk anak kos. 
                                Berikut dikutip dari Danacita, Rabu (10/1/2024), beberapa barang yang wajib kamu punya di kosan.
                            </p>
                        </div>
                    </a>
                </div> -->

            </div>

            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
<!-- Artikel Terbaru -->
<section id="news"class="bg-gray-100 py-12">
    <div class="container mx-auto px-6">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Artikel Terbaru</h2>
        <div class="flex items-center w-1/3 relative">
          <input 
            type="text" 
            class="w-full border border-gray-300 rounded-full px-4 py-2 pl-10 text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
            placeholder="Cari di sini...">
      </div>
    </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
                foreach($data_berita as $dat){
                    $full_description = $dat['deskripsi_berita'];

                    // Batasi deskripsi hanya beberapa kata (misalnya 20 kata)
                    $words = explode(' ', $full_description); // Pisahkan menjadi array kata
                    $short_description = implode(' ', array_slice($words, 0, 30)); // Ambil 20 kata pertama

                    // Tambahkan tanda "..." jika deskripsi lebih panjang dari 20 kata
                    if (count($words) > 30) {
                        $short_description .= '...';
                    echo <<< EDO
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{$dat['gambar_berita']}" alt="Artikel 1" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold  text-gray-800">{$dat['judul_berita']}</h3>
                            <p class="text-gray-600 mt-2">{$short_description}</p>
                            <a href="/project_paw/pencari/isiberita/{$dat['id_berita']}" class=" text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                        </div>
                    </div>
                    EDO;
                }
            }
                ?>
        
            <!-- <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 2</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 2 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
        
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 3</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 3 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
            
             <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 4</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 4 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
        
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 4</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 4 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
        
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 4</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 4 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div> -->
        </div>
    </section>
    <?php require './views/Components/FooterHomepage.php' ?>
    <script>
    // Ambil elemen input untuk pencarian
    const searchInput = document.querySelector('input[placeholder="Cari di sini..."]');

    // Ambil semua kartu artikel
    const articleCards = document.querySelectorAll(".grid > div");

    // Tambahkan event listener untuk pencarian
    searchInput.addEventListener("input", function () {
        const searchQuery = this.value.toLowerCase(); // Ambil teks pencarian dan ubah ke huruf kecil
        articleCards.forEach(card => {
            const articleTitle = card.querySelector("h3").textContent.toLowerCase(); // Ambil judul artikel
            const matchesSearch = articleTitle.includes(searchQuery); // Periksa apakah judul sesuai pencarian
            card.style.display = matchesSearch ? "block" : "none"; // Tampilkan/sembunyikan kartu
        });
    });

    </script>

</body>
<?php require './views/Components/Foot.php' ?>

