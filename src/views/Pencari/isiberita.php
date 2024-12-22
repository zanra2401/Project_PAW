<?php 
require './views/Components/Head.php';
$data_berita = $data['data_berita'];
?>
<link rel="stylesheet" href="<?= NODE_MODULES ?>/quill/dist/quill.snow.css">
<script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>

<body class="bg-gray-50">
    <!-- Konten Berita -->
    <section class="max-w-screen-xl mx-auto mt-12 px-4 lg:px-0">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Konten Utama -->
            <div class="lg:col-span-2">
                <article class="bg-white p-6 rounded-lg shadow-lg">
                    <?php 
                    $project_name = PROJECT_NAME;
                    foreach ($data_berita as $dat) {
                        $isiBerita = $dat['deskripsi_berita'];
                        echo <<< EDO
                        <h1 class="text-4xl font-bold text-gray-800 mb-6 leading-tight">{$dat['judul_berita']}</h1>
                        
                        <!-- Gambar Artikel -->
                        <div class="mb-8 h-[500px] overflow-hidden">
                            <img src="/{$project_name}/{$dat['cover_berita']}" alt="Gambar Berita" class="w-full h-auto object-cover object-center rounded-lg shadow-md">
                        </div>
                        
                        <!-- Konten Berita -->
                        <div id="isiBerita" class="text-lg text-gray-700 text-justify leading-relaxed mb-6 px-6 py-6 whitespace-pre-line">
                            
                        </div>
                    
                        EDO;
                    }
                    ?>
                </article>
            </div>
        </div>
    </section>
    <script>
        const editorContainer = document.getElementById("isiBerita");
            const options = {
                debug: 'info',
                modules: {
                    toolbar: false,
                },
                theme: 'snow',
                readOnly: true
            };

        const quill = new Quill(editorContainer, options);
        quill.root.innerHTML = '<?= $isiBerita ?>';
    </script>
</body>
<?php require './views/Components/Foot.php' ?>
