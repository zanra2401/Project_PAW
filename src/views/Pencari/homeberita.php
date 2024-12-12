<?php require './views/Components/Head.php' ?>
<body class="bg-gray-100">
<div id="default-carousel" class="relative w-full h-64 mb-44" data-carousel="slide">

    <!-- Carousel wrapper -->
    <div class="relative h-96 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="block  ease-in-out" data-carousel-item>
            <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            <div class="absolute top-1/2 left-1/3 z-20 text-center transform -translate-x-1/2 -translate-y-1/2">
              <h2 class="text-black text-2xl text-left font-bold mb-2">Berita Utama Hari Ini</h2>
              <p class="text-black text-xl text-left mb-4">Deskripsi singkat dari berita utama hari ini yang menarik perhatian publik.</p>
              <a href="#" class=" text-left text-blackfont-bold hover:underline">Baca Selengkapnya →</a>
            </div>
            
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
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
<!-- Artikel Terbaru -->
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
            <!-- Artikel 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-xl text-gray-800">Judul Artikel 1</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 1 yang menarik perhatian pembaca.</p>
                    <a href="#" class=" text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
            <!-- Artikel 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 2</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 2 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
            <!-- Artikel 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 3</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 3 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
             <!-- Artikel 4 -->
             <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 4</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 4 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
            <!-- Artikel 5 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Artikel 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Judul Artikel 4</h3>
                    <p class="text-gray-600 mt-2">Deskripsi singkat tentang artikel 4 yang menarik perhatian pembaca.</p>
                    <a href="#" class="text-blue-600 font-bold hover:underline mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            </div>
            <!-- Artikel 6 -->
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
