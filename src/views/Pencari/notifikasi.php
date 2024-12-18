<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - Cari Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Container with white background, adjusted width, and centered -->
    <div class="bg-white rounded-lg shadow-lg w-full sm:max-w-md md:max-w-2xl mx-auto mt-5 p-4">
        <h1 class="text-3xl font-bold text-gray-700 mb-6 text-center">Notifikasi</h1>


        <div class="space-y-4">
            <?php 
                foreach ($data['data'] as $dat) 
                {
                    echo <<<EOD
                        <div
                            class="flex items-start p-4 bg-blue-50 border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                            <div class="flex-shrink-0 bg-blue-500 text-white rounded-full h-8 w-8 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 13l3 3L22 4m-5 16H5a2 2 0 01-2-2V5a2 2 0 012-2h7m0 0l5 5m-5-5v5" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-800">{$dat['isi_pengumuman']}</p>
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