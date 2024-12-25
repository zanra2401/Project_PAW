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
            <div class="flex space-x-4 mb-5">
                <button onclick="window.history.back()" class="text-lg font-semibold hover:text-gray-500">
                    <i class="fa-solid fa-right-from-bracket" style="transform: rotate(180deg);"></i>
                    Kembali
                </button>
            </div>
                <article class="bg-white p-6 rounded-lg shadow-lg">
                    <?php 
                    $project_name = PROJECT_NAME;
                    foreach ($data_berita as $dat) {
                        // Pisahkan isi berita menjadi paragraf
                        $paragraf_berita = explode("\n", $dat['deskripsi_berita']);
                        echo <<< EDO
                        <h1 class="text-4xl font-bold text-gray-800 mb-6 leading-tight">{$dat['judul_berita']}</h1>
                        
                        <!-- Gambar Artikel -->
                        <div class="mb-8 h-[500px] overflow-hidden">
                            <img src="/{$project_name}/{$dat['cover_berita']}" alt="Gambar Berita" class="w-full h-auto object-cover object-center rounded-lg shadow-md">
                        </div>
                        
                        <!-- Konten Berita -->
                        <div class="text-lg text-gray-700 text-justify leading-relaxed mb-6 px-6 py-6 whitespace-pre-line">
                        EDO;

                        // Render setiap paragraf dengan tag <p>
                        foreach ($paragraf_berita as $paragraf) {
                            if (!empty(trim($paragraf))) {
   
                                $paragrafArray = preg_split('/(?<=\.)\s+/', $paragraf); // Memecah teks menjadi paragraf berdasarkan titik.
                                
                                echo "<div class='max-w-prose mx-auto text-lg leading-relaxed break-words'>";
                                foreach ($paragrafArray as $item) {
                                    // Memeriksa apakah ada angka seperti "1." di awal
                                    if (preg_match('/^\d+\./', $item)) {
                                        // Jika ada, anggap ini sebagai daftar dan pecah berdasarkan angka
                                        $poinArray = preg_split('/\d+\.\s*/', $item);
                                        array_shift($poinArray); // Menghapus elemen pertama yang kosong karena pecah pada angka pertama
                                
                                        echo "<ul class='list-decimal pl-6 mb-4'>";
                                        foreach ($poinArray as $poin) {
                                            if (!empty($poin)) {
                                                echo "<li>" . htmlspecialchars(trim($poin)) . "</li>";
                                            }
                                        }
                                        echo "</ul>";
                                    } else {
                                        // Jika bukan angka, anggap ini sebagai paragraf biasa
                                        echo "<p class='mb-4'>" . htmlspecialchars(trim($item)) . "</p>";
                                    }
                                }
                                echo "</div>";

                            }
                        }

                        echo <<< EDO
                        </div>
                        EDO;
                    }
                    ?>
                </article>
            </div>
        </div>
    </section>
</body>
<?php require './views/Components/Foot.php'; ?>
