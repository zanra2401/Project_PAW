<?php require './views/Components/Head.php' ?>
<body class="bg-gray-100">
  <!-- Navbar -->
  <header class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      
      <nav class="space-x-6 text-gray-600">
        <a href="#" class="hover:text-blue-600">Beranda</a>
        <a href="#" class="hover:text-blue-600">Nasional</a>
        <a href="#" class="hover:text-blue-600">Internasional</a>
        <a href="#" class="hover:text-blue-600">Ekonomi</a>
        <a href="#" class="hover:text-blue-600">Teknologi</a>
      </nav>
    </div>

    
<form class="max-w-md mx-auto">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>

  </header>

  <!-- Hero Section -->
  <section class="bg-base-color text-white py-10">
    <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center">
      <div class="lg:w-1/2">
        <h1 class="text-4xl font-bold mb-4">Berita Terbaru Hari Ini</h1>
        <p class="text-lg mb-6">Temukan berita terkini, terpercaya, dan terlengkap di sini.</p>
        <a href="#" class="px-6 py-3 bg-white text-blue-600 font-bold rounded-lg shadow hover:bg-gray-200">Baca Selengkapnya</a>
      </div>
      <div class="lg:w-1/2 mt-6 lg:mt-0">
        <img src="https://via.placeholder.com/500" alt="Hero Image" class="rounded-lg shadow-lg">
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Featured Article -->
      <div class="md:col-span-2 bg-white shadow rounded-lg p-4">
        <img src="https://via.placeholder.com/800x400" alt="Featured News" class="rounded-lg mb-4">
        <h2 class="text-2xl font-bold mb-2">Berita Utama Hari Ini</h2>
        <p class="text-gray-600 mb-4">Deskripsi singkat dari berita utama hari ini yang menarik perhatian publik.</p>
        <a href="#" class="text-blue-600 font-bold hover:underline">Baca Selengkapnya →</a>
      </div>
      <!-- Sidebar Articles -->
      <div class="space-y-4">
        <div class="bg-white shadow rounded-lg p-4 flex">
          <img src="https://via.placeholder.com/100" alt="Sidebar News" class="rounded-lg w-1/3 mr-4">
          <div>
            <h3 class="text-lg font-bold">Judul Berita Samping</h3>
            <p class="text-gray-600 text-sm">Deskripsi singkat berita...</p>
          </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 flex">
          <img src="https://via.placeholder.com/100" alt="Sidebar News" class="rounded-lg w-1/3 mr-4">
          <div>
            <h3 class="text-lg font-bold">Judul Berita Samping</h3>
            <p class="text-gray-600 text-sm">Deskripsi singkat berita...</p>
          </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 flex">
          <img src="https://via.placeholder.com/100" alt="Sidebar News" class="rounded-lg w-1/3 mr-4">
          <div>
            <h3 class="text-lg font-bold">Judul Berita Samping</h3>
            <p class="text-gray-600 text-sm">Deskripsi singkat berita...</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
      <p class="text-sm">&copy; 2024 BeritaOnline. All rights reserved.</p>
    </div>
  </footer>
</body>

