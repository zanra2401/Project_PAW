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
                $temp = 0;
                foreach($data_berita as $dat){
                    if ($temp == 3){
                        break;
                    }
                    $full_description = $dat['deskripsi_berita'];

                    $path_gambar = "/" . PROJECT_NAME . $dat['cover_berita'];
                    // Batasi deskripsi hanya beberapa kata (misalnya 20 kata)
                    $words = explode(' ', $full_description); // Pisahkan menjadi array kata
                    $short_description = implode(' ', array_slice($words, 0, 30)); // Ambil 20 kata pertama

                    // Tambahkan tanda "..." jika deskripsi lebih panjang dari 20 kata
                    if (count($words) > 30) {
                        $short_description .= '...';
                    }   

                    echo <<<EDO
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{$path_gambar}" class="w-full h-full object-cover" alt="...">
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
                    $temp += 1;
                }

            ?>
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
            placeholder="Cari di sini..."
            id="searchInput">
      </div>
    </div>
        <div id="allBerita" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 

                $get = 1;
                foreach($data_berita as $dat){
                    if($get > 3){
                        $full_description = $dat['deskripsi_berita'];
                        // Batasi deskripsi hanya beberapa kata     (misalnya 20 kata)
                        $words = explode(' ', $full_description); // Pisahkan menjadi array kata
                        $short_description = implode(' ', array_slice($words, 0, 30)); // Ambil 20 kata pertama
                        $project_name = PROJECT_NAME;
                        // Tambahkan tanda "..." jika deskripsi lebih panjang dari 20 kata
                        if (count($words) > 30) {
                            $short_description .= '...';
                        }
                        echo <<< EDO
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                <img src="/{$project_name}/{$dat['cover_berita']}" alt="Artikel 1" class="w-full h-48 object-cover">
                                <div class="p-6">
                                    <h3 class="text- font-bold  text-gray-800">{$dat['judul_berita']}</h3>
                                    <p class="text-gray-600 mt-2">{$short_description}</p>
                                    <a href="/project_paw/pencari/isiberita/{$dat['id_berita']}" class=" text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                                </div>
                            </div>
                        EDO;
                    }

                    $get += 1;
                
                }
            ?>
        </div>
    </section>

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
                                    <h3 class="text-lg font-medium judul_berita">{$contact[0]['username_user']}</h3>
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
        // Ambil elemen input untuk pencarian
        // const searchInput = document.querySelector('input[placeholder="Cari di sini..."]');

        // Ambil semua kartu artikel
        // const articleCards = document.querySelectorAll(".grid > div");

        // articleCards.forEach(card => {
        //     const articleTitle = card.querySelectorAll("h3").textContent
        //     console.log(articleTitle)
        // });

        // // Tambahkan event listener untuk pencarian
        // searchInput.addEventListener("input", function () {
        //     const searchQuery = this.value.toLowerCase(); 
        //     articleCards.forEach(card => {
        //         const articleTitle = card.querySelector("h3").textContent.toLowerCase(); // Ambil judul artikel
        //         const matchesSearch = articleTitle.includes(searchQuery); // Periksa apakah judul sesuai pencarian
        //         card.style.display = matchesSearch ? "block" : "none"; // Tampilkan/sembunyikan kartu
        //     });
        // });

        const toggleBoxBtn = document.getElementById("chat_button");
        const box = document.getElementById("box");
        const content = document.getElementById("content");
        const close_chat = document.getElementById('close_chat');

        // toggleBoxBtn.addEventListener("click", function() {
        //     box.classList.remove('hidden');
        //     box.classList.remove("box-exit");
        //     box.classList.add("box-enter");
        //     document.body.classList.add("no-scroll");
        // });

        // close_chat.addEventListener('click', ()=>{
        //     box.classList.remove("box-enter");
        //     box.classList.add("box-exit");
        //     setTimeout(() => {
        //         box.classList.add('hidden');
        //         document.body.classList.remove("no-scroll");
        //     }, 500);
        // })

        searchInput.addEventListener('keyup', () => {
            fetch('/<?= PROJECT_NAME ?>/pencari/cariberita', {
                method: 'POST', // HTTP method
                headers: {
                    'Content-Type': 'application/json', // Sending JSON data
                },
                body: JSON.stringify({
                    "search" : searchInput.value
                }) // Stringify the data for transmission
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    let get = 1;
                    dataBerita = ``;
                    data.forEach((dat) => {
                       
                        let fullDescription = dat.deskripsi_berita;

                        // Limit the description to 30 words
                        let words = fullDescription.split(" ");
                        let shortDescription = words.slice(0, 30).join(" ");
                        if (words.length > 30) {
                            shortDescription += "...";
                        }


                        dataBerita += `
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="/<?= PROJECT_NAME ?>/${dat.cover_berita}" alt="Article ${dat.id_berita}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="font-bold text-gray-800">${dat.judul_berita}</h3>
                                <p class="text-gray-600 mt-2">${shortDescription}</p>
                                <a href="/<?= PROJECT_NAME ?>/pencari/isiberita/${dat.id_berita}" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                            </div>
                        </div>`;

                        

                        get += 1;
                    });
                    allBerita.innerHTML = dataBerita;
                })
                .catch(error => {
                    console.log(`<p style="color: red;">Error: ${error.message}</p>`);
                });
        });
    </script>
</body>
<?php require './views/Components/Foot.php' ?>

