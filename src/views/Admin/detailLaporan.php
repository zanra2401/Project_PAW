<?php require './views/Components/Head.php'; ?>
<body class="h-screen flex">
    <?php require './views/Components/sidebarAdmin.php'; ?>    
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col p-6">
        <!-- Breadcrumb -->
        <span class="mb-3 text-gray-600">
            <i class="fas fa-file"></i> Laporan
            <i class="fas fa-chevron-right"></i> 
            <i class="fa fa-clipboard"></i> Detail Laporan
        </span>
        
        <!-- Judul Halaman -->
        <?php foreach ($data['laporan'] as $key => $laporan) : ?>
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Detail Laporan</h2>
        
        <!-- Informasi Laporan -->
        <div class="mb-6">
            <p class="text-gray-700 mb-1"><span class="font-semibold">Username:</span> <?= htmlspecialchars($laporan['username']); ?></p>
            <br>
            <p class="text-gray-700"><span class="font-semibold">Tanggal: </span><?= date('Y-m-d', strtotime($laporan['data']['tanggal_laporan'])); ?></p>
        </div>

        <div class="mb-6">
            <p class="font-semibold">Kategori Laporan :</p>
            <?php 
                $kategoriCount = count($laporan['kategori']);
                foreach ($laporan['kategori'] as $index => $kategori): 
            ?>
                <?= $kategori; ?><?php if ($index < $kategoriCount - 1) echo ', '; ?>
            <?php endforeach; ?>
        </div>
        
        <!-- Isi Laporan -->
        <div class="border-t border-gray-300 pt-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Isi Laporan:</h3>
            <p class="text-gray-700 leading-relaxed">
            <?= $laporan['data']['deskripsi_laporan']?>
            </p>
        </div>
        <?php endforeach; ?>
        <!-- Tombol Navigasi -->
        <div class="mt-6">
            <a href="/<?= PROJECT_NAME ?>/Admin/laporan" class="inline-block bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                Kembali ke Daftar Laporan
            </a>
        </div>
    </main>
</body>
<?php require './views/Components/Foot.php'; ?>
