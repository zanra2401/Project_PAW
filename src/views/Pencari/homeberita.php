<?php require './views/Components/Head.php' ?>
<body class="bg-gray-100">
<?php require "./views/Components/NavBar.php" ?> 

<br>
<div class="mx-auto w-full">
    <div id="default-carousel" class="relative h-[600px]" data-carousel="slide">
        <div class="relative h-full w-full overflow-hidden">

            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://e1.365dm.com/24/11/768x432/skysports-liverpool-arne-slot_6760348.jpg?20241128160318" 
                     class="w-full h-full object-cover bg-clip-content" alt="...">
            </div>

            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://akcdn.detik.net.id/community/media/visual/2023/08/12/ilustrasi-rumah-kos-freepik_169.jpeg?w=700&q=90" 
                     class="w-full h-full object-cover" alt="...">
            </div>

            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/66/2024/12/12/WhatsApp-Image-2024-12-12-at-111507-1103923420.jpeg" 
                class="w-full h-full object-cover" alt="...">
            </div>
        </div>

        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
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



<section class="bg-gray-100 py-12">
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
        
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-xl text-gray-800">Judul Artikel 1</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 1 yang menarik perhatian pembaca.</p>
                    <a href="#" class=" text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
        
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
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
            </div>
        </div>
    </section>

</body>
<?php require './views/Components/Foot.php' ?>
