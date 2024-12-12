<?php require './views/Components/Head.php' ?>

<body class="bg-gray-50">
    <!-- Konten Berita -->
    <section class="max-w-screen-xl mx-auto mt-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Konten Utama -->
            <div class="lg:col-span-2">
                <article>
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Judul Berita Utama</h1>
                    <p class="text-gray-600 text-sm mb-6">Dipublikasikan pada <span class="font-semibold">12 Desember 2024</span> | Oleh <span class="font-semibold">Penulis Berita</span></p>
                    
                    <!-- Gambar Artikel -->
                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Gambar Berita" class="w-full rounded-lg mb-8">
                    
                    <!-- Konten Berita -->
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Nulla vitae massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit.</p>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Nulla vitae massa. Fusce ac turpis quis ligula lacinia aliquet.</p>

                </article>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Artikel Terkait</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-blue-600 hover:underline">Judul Artikel Terkait 1</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Judul Artikel Terkait 2</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Judul Artikel Terkait 3</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Judul Artikel Terkait 4</a></li>
                    </ul>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md mt-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Kategori</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-blue-600 hover:underline">Politik</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Olahraga</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Teknologi</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Ekonomi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>
<?php require './views/Components/Foot.php' ?>
