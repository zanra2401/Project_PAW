<?php 
require './views/Components/Head.php';

// Pastikan data berita tersedia
$data_berita = $data['data_berita'] ?? [];
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
                    // Pastikan konstanta PROJECT_NAME ada
                    $project_name = defined('PROJECT_NAME') ? PROJECT_NAME : 'project_name';

                    // Render setiap berita
                    if (!empty($data_berita)) {
                        foreach ($data_berita as $dat) {
                            // Sanitize judul dan deskripsi untuk menghapus semua tag HTML dan atribut style
                            $judul_berita = strip_tags($dat['judul_berita'] ?? '');
                            $cover_berita = htmlspecialchars($dat['cover_berita'] ?? '');
                            
                            // Hapus semua atribut style pada deskripsi
                            $deskripsi_berita = preg_replace('/style=["\'].*?["\']/', '', $dat['deskripsi_berita'] ?? '');
                            // Hapus tag HTML yang tersisa
                            $deskripsi_berita = strip_tags($deskripsi_berita);

                            // Pisahkan isi berita menjadi paragraf berdasarkan newline
                            $paragraf_berita = explode("\n", $deskripsi_berita);

                            echo <<< EDO
                            <h1 class="text-4xl font-bold text-gray-800 mb-6 leading-tight">{$judul_berita}</h1>
                            
                            <!-- Gambar Artikel -->
                            <div class="mb-8 h-[500px] overflow-hidden">
                                <img src="/{$project_name}/{$cover_berita}" alt="Gambar Berita" class="w-full h-auto object-cover object-center rounded-lg shadow-md">
                            </div>
                            
                            <!-- Konten Berita -->
                            <div class="text-lg text-gray-700 text-justify leading-relaxed mb-6 px-6 py-6 whitespace-pre-line">
                            EDO;

                            // Render setiap paragraf dengan tag <p>
                            foreach ($paragraf_berita as $paragraf) {
                                $paragraf = trim($paragraf); // Hilangkan spasi kosong di awal/akhir
                                if (!empty($paragraf)) {
                                    // Pecah paragraf menjadi kalimat berdasarkan titik
                                    $paragrafArray = preg_split('/(?<=\.)\s+/', $paragraf);

                                    echo "<div class='max-w-prose mx-auto text-lg leading-relaxed break-words'>";
                                    foreach ($paragrafArray as $item) {
                                        $item = htmlspecialchars($item); // Pastikan teks aman dari tag HTML

                                        // Memeriksa apakah kalimat dimulai dengan angka (seperti "1.")
                                        if (preg_match('/^\d+\./', $item)) {
                                            // Jika ada, anggap ini sebagai daftar dan pecah berdasarkan angka
                                            $poinArray = preg_split('/\d+\.\s*/', $item);
                                            array_shift($poinArray); // Hapus elemen kosong karena pecahan pertama

                                            echo "<ul class='list-decimal pl-6 mb-4'>";
                                            foreach ($poinArray as $poin) {
                                                $poin = htmlspecialchars(trim($poin));
                                                if (!empty($poin)) {
                                                    echo "<li>{$poin}</li>";
                                                }
                                            }
                                            echo "</ul>";
                                        } else {
                                            // Jika bukan angka, anggap sebagai paragraf biasa
                                            echo "<p class='mb-4'>{$item}</p>";
                                        }
                                    }
                                    echo "</div>";
                                }
                            }

                            echo <<< EDO
                            </div>
                            EDO;
                        }
                    } else {
                        // Tampilkan pesan jika tidak ada berita
                        echo "<p class='text-center text-gray-500'>Tidak ada berita yang tersedia.</p>";
                    }
                    ?>
                </article>
            </div>
        </div>
    </section>
</body>
<?php 
require './views/Components/Foot.php'; 
?>
