<?php require './views/Components/Head.php'; ?>
<script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>
<body class="min-h-screen flex">
    <style>
        /* Styling untuk input file */
        .input-file-wrapper {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .input-file {
            display: none; /* Menyembunyikan input file asli */
        }
    </style>

<?php require "./views/Components/sidebarAdmin.php"; ?>

<main class="p-5 w-full min-h-screen box-border bg-gray-50 flex flex-col">
    <span class="text-gray-600"><i class="fas fa-newspaper"></i> Berita <i class="fas fa-chevron-right"></i> <i class="fas fa-file"></i> Edit Berita</span>
    <h2 class="text-xl font-bold mb-4 mt-4">Edit Berita</h2>

    <form action="/<?= PROJECT_NAME ?>/Admin/updateBerita" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
            <img id="previewImage" src="<?= "/" . PROJECT_NAME . "/" . $data['berita']['cover_berita']?>" class="w-36 rounded-lg" alt="Cover Berita">
        </div>

        <!-- Ubah Cover -->
        <div class="input-file-wrapper mb-4">
            <input type="file" id="cover_berita" name="cover_berita" accept="image/*" onchange="previewImageFunction()" class="input-file">
            <label for="cover_berita" class="inline-block bg-red-500 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-red-600">
                Ubah Cover
            </label>
        </div>

        <!-- Input ID Berita -->
        <input type="hidden" name="idBerita" value="<?= htmlspecialchars($data['berita']['id_berita']); ?>">

        <!-- Input Judul Berita -->
        <label for="judul" class="block text-gray-700">Judul Berita</label>
        <input type="text" id="judul" name="judul" 
               value="<?= htmlspecialchars($data['berita']['judul_berita']); ?>" 
               class="w-full p-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-brown-600">

        <!-- Input Deskripsi Berita -->
        <label for="deskripsi" class="block text-gray-700">Deskripsi Berita</label>
        <textarea id="deskripsi" name="deskripsi" 
                  class="w-full p-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-brown-600"><?= htmlspecialchars($data['berita']['deskripsi_berita']); ?></textarea>

        <!-- Tombol Submit -->
        <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600 ">
            Update Berita
        </button>
    </form>
</main>

<script>
    // Fungsi untuk menampilkan preview gambar sebelum di-upload
    function previewImageFunction() {
        const file = document.getElementById('cover_berita').files[0]; // Ambil file yang dipilih
        const reader = new FileReader(); // Membaca file

        reader.onload = function(e) {
            const preview = document.getElementById('previewImage'); // Gambar preview
            preview.src = e.target.result; // Set sumber gambar dengan hasil pembacaan file
        };

        if (file) {
            reader.readAsDataURL(file); // Mulai pembacaan file sebagai data URL
        }
    }
</script>

</body>
<?php require './views/Components/Foot.php'; ?>
