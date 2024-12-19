<?php require './views/Components/Head.php'; ?>
<body class="h-screen flex">
    <?php require './views/Components/sidebarAdmin.php'; ?>    
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
    <span class="mb-3 text-gray-600 p-5"><i class="fas fa-question"></i></i> Pertanyaan <i class="fas fa-chevron-right"></i> </span>
        <div class="relative overflow-x-auto">
            <div class="flex items-center">
                <h1 class="font-Roboto-bold text-2xl p-5">Pertanyaan</h1>
            </div>


            <table id="questionsTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">Pertanyaan</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['dataPertanyaan'] as $pertanyaan) :?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $pertanyaan['username_user']?>
                        </th>
                        <td class="px-6 py-4"><?= $pertanyaan['isi_pertanyaan']?></td>
                        <td class="px-6 py-4"><?= $pertanyaan['tanggal_pertanyaan']?></td>
                        <td class="px-6 py-4">
                            <form action="/<?= PROJECT_NAME ?>/Admin/balasPertanyaan" method="POST">
                              <input type="text" name="idPertanyaan" value="<?=$pertanyaan['id_pertanyaan']?>" hidden>
                              <button type="submit" class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-base-color">balas</button>  
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
    </script>
</body>
<?php require './views/Components/Foot.php'; ?>