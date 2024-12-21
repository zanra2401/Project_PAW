<?php 
require './views/Components/Head.php';
$data_berita = $data['data_berita'];
?>

<body class="bg-gray-50">
    <!-- Konten Berita -->
    <section class="max-w-screen-xl mx-auto mt-12 px-4 lg:px-0">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Konten Utama -->
            <div class="lg:col-span-2">
                <article class="bg-white p-6 rounded-lg shadow-lg">
                    <?php 
                    foreach ($data_berita as $dat) {
                        echo <<< EDO
                        <h1 class="text-4xl font-bold text-gray-800 mb-6 leading-tight">{$dat['judul_berita']}</h1>
                        
                        <!-- Gambar Artikel -->
                        <div class="mb-8">
                            <img src="{$dat['gambar_berita']}" alt="Gambar Berita" class="w-full h-auto rounded-lg shadow-md">
                        </div>
                        
                        <!-- Konten Berita -->
                        <p class="text-lg text-gray-700 text-justify leading-relaxed mb-6 px-6 py-6 whitespace-pre-line">
                            {$dat['deskripsi_berita']}
                        </p>
                    
                        EDO;
                    }
                    ?>
                </article>
            </div>
        </div>
    </section>
</body>
<?php require './views/Components/Foot.php' ?>
