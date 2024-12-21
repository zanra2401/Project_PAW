<?php require './views/Components/Head.php'; ?>
<body class="h-screen flex">
    <?php require './views/Components/sidebarAdmin.php'; ?>    
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
    <span class="mb-3 text-gray-600 p-5"><i class="fas fa-file"></i> Laporan <i class="fas fa-chevron-right"></i></span>
        <div class="relative overflow-x-auto">
            <div class="flex items-center">
                <h1 class="font-Roboto-bold text-2xl p-5">Laporan</h1>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Laporan</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>

    <?php foreach ($data['laporan'] as $key => $laporan) : ?>
        <tr class="bg-white border-b">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                <?= htmlspecialchars($laporan['username']); ?>
            </th>
            <td class="px-6 py-4">
            <?php foreach ($laporan['kategori'] as $kategori): ?>
                <?= $kategori; ?>, 
            <?php endforeach; ?>
            </td>
            <td class="px-6 py-4">
                <?= htmlspecialchars($laporan['data']['deskripsi_laporan']); ?>
            </td>
            <td class="px-6 py-4">
                <?= htmlspecialchars($laporan['data']['tanggal_laporan']); ?>
            </td>
            <td class="px-6 py-4">
                <form action="/<?= PROJECT_NAME ?>/Admin/detailLaporan" method="POST">
                    <input type="hidden" name="idLaporan" value="<?= $key ?>">
                    <button type="submit"
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                        Detail
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

            </table>
        </div>
    </main>
</body>
<?php require './views/Components/Foot.php'; ?>
