<?php require './views/Components/Head.php'; ?>
<body class="min-h-screen flex">
<?php require "./views/Components/sidebarAdmin.php"; ?>
<main class="p-5 w-full min-h-screen box-border bg-gray-50 flex flex-col">
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
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
            Update Berita
        </button>
    </form>
</main>
</body>
<?php require './views/Components/Foot.php'; ?>
