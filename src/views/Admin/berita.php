<?php require './views/Components/Head.php' ?>

<body class="min-h-screen flex">
<style>
    .action-center {
        text-align: center;
        vertical-align: middle;
    }

    .btn-brown {
        background-color: #8B4513;
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        text-align: center;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-brown:hover {
        background-color: #A0522D;
    }

    .search-input {
        width: 300px;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>

<?php require "./views/Components/sidebarAdmin.php" ?>

<main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
    <span class="mb-3 text-gray-600 p-5"><i class="fas fa-newspaper"></i> Berita <i class="fas fa-chevron-right"></i></span>

    <div>
        <div class="p-5 flex justify-between items-center">
            <h2 class="text-xl font-bold p-5">Daftar Berita</h2>
            <a href="tambahBerita" class="btn-brown">Tambah Berita</a>
        </div>
    </div>

    <div class="p-5">
        <!-- Input untuk Pencarian -->
        <input type="text" id="searchInput" class="search-input" placeholder="Cari berita...">

        <table id="beritaTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Judul Berita</th>
                    <th scope="col" class="px-6 py-3">Deskripsi Berita</th>
                    <th scope="col" class="px-6 py-3">Tanggal Dipublish</th>
                    <th scope="col" class="px-6 py-3 action-center">Aksi</th>
                    <th scope="col" class="px-6 py-3 action-center">Hapus</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data['berita'] as $berita): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $berita['judul_berita']; ?>
                </th>
                <td class="px-6 py-4">
                    <?php 
                        $maxLength = 100; // Batas panjang deskripsi
                        $deskripsi = $berita['deskripsi_berita'];
                        echo strlen($deskripsi) > $maxLength 
                            ? substr($deskripsi, 0, $maxLength) . '...' 
                            : $deskripsi;
                    ?>
                </td>
                <td class="px-6 py-4 text-xs">
                    <?php echo date('d F Y', strtotime($berita['tanggal_dipublish_berita'])); ?>
                </td>
                <td class="action-center">
                    <form action="/<?= PROJECT_NAME ?>/Admin/editberita" method="POST">
                        <input type="hidden" name="idBerita" value="<?= $berita['id_berita'] ?>">
                        <button type="submit" class="btn-brown">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="/<?= PROJECT_NAME ?>/Admin/hapusBerita" method="GET">
                        <input type="hidden" name="idBerita" value="<?= $berita['id_berita'] ?>">
                        <button type="submit" class="btn-brown" >hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<script>
    // Pencarian Berita
    const searchInput = document.getElementById('searchInput');
    const beritaTable = document.getElementById('beritaTable');
    const rows = beritaTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();
        Array.from(rows).forEach(row => {
            const titleCell = row.getElementsByTagName('th')[0];
            const titleText = titleCell.textContent || titleCell.innerText;

            if (titleText.toLowerCase().includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<?php require './views/Components/Foot.php' ?>