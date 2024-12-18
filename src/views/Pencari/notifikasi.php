<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - Cari Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Container with full-width and maximum width on larger screens -->
    <div class="bg-white rounded-lg shadow-lg w-full max-w-full mx-auto mt-5 p-4">
        <h1 class="text-3xl font-bold text-[#000000] mb-6 text-center">Notifikasi</h1>

        <div class="space-y-4">
            <?php 
                foreach ($data['data'] as $dat)
                {
                    echo <<<EOD
                        <div
                            class="flex items-start p-4 bg-[#f1e1d0] border border-[#68422d] rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                            <!-- Logo for each notification -->
                            <div class="flex-shrink-0 bg-[#68422d] text-white rounded-full h-10 w-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13l3 3L22 4m-5 16H5a2 2 0 01-2-2V5a2 2 0 012-2h7m0 0l5 5m-5-5v5" />
                                </svg>
                            </div>
                            <!-- Notification content -->
                            <div class="ml-4">
                            <p class="text-sm font-medium text-[#68422d]">{$dat['judul_pengumuman']}</p>
                                <p class="text-sm font-medium text-[#68422d]">{$dat['isi_pengumuman']}</p>
                                <p class="text-sm font-medium text-[#68422d]">Untuk : {$dat['tipe_pengumuman']}</p>
                                <span class="text-xs text-gray-500 mt-1 block">{$dat["tanggal_pengumuman"]}</span>
                            </div>
                        </div>  
                    EOD;
                }
            ?>
        </div>
    </div>
</body>

</html>