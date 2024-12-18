<?php require './views/Components/Head.php'; ?>
<script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>
<body class="min-h-screen flex">
    <style>
        .btn-brown {
            background-color: #8B4513; /* Warna coklat */
            color: white; /* Warna teks putih */
            padding: 8px 12px; /* Padding untuk ukuran tombol */
            border-radius: 8px; /* Border melengkung */
            text-align: center;
            font-size: 14px; /* Ukuran teks */
            cursor: pointer;
            transition: background-color 0.3s; /* Efek transisi */
        }

        .btn-brown:hover {
            background-color: #A0522D; /* Warna coklat lebih terang saat hover */
        }
    </style>
<?php require "./views/Components/sidebarAdmin.php"; ?>
<main class="p-5 w-full min-h-screen box-border bg-gray-50 flex flex-col">
<span class="mb-3 text-gray-600 p-5"><i class="fas fa-newspaper"></i> Berita <i class="fas fa-chevron-right"></i> <i class="fas fa-file"></i> Edit Berita</span>
    <h2 class="text-xl font-bold mb-4">Edit Berita</h2>
    <form action="/<?= PROJECT_NAME ?>/Admin/updateBerita" method="POST">
        <!-- Input ID Berita -->
        <input type="hidden" name="idBerita" value="<?= htmlspecialchars($data['berita']['id_berita']); ?>">

        <!-- Input Judul Berita -->
        <label for="judul" class="block text-gray-700">Judul Berita</label>
        <input type="text" id="judul" name="judul" 
               value="<?= htmlspecialchars($data['berita']['judul_berita']); ?>" 
               class="w-full p-2 border rounded mb-4">
        
        <!-- Input Deskripsi Berita -->
        <label for="deskripsi" class="block text-gray-700">Deskripsi Berita</label>
        <textarea id="deskripsi" name="deskripsi" 
                  class="w-full p-2 border rounded mb-4"><?= htmlspecialchars($data['berita']['deskripsi_berita']); ?></textarea>

        <!-- Tombol Submit -->
        <button type="submit" class="px-4 py-2  text-white rounded btn-brown">
            Update Berita
        </button>
    </form>
</main>
</body>
<?php require './views/Components/Foot.php'; ?>
