<?php require './views/Components/Head.php' ?>
<body class="h-screen flex ">
    <script src="<?= JS ?>/libs/fullcalendar.js"></script>    
    <?php require "./views/Components/sidebarAdmin.php" ?>
    <style>
    </style>
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col">
        <div class="w-full h-screen overflow-y-scroll p-5">
        <div class="grid grid-cols-3 grid-rows-2 gap-3 gap-y-5 w-full h-fit">

            <div class="bg-white rounded-lg shadow-sm shadow-gray-500 p-5 h-96">
                <div class="h-full w-full">
                    <div id="calendar"></div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm shadow-gray-500 p-5 h-96">
            <div class="border-b border-gray-200 pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Total Transaksi</h2>
    </div>
    <div class="text-center">
        <p class="text-gray-500 mb-2">Total Transaksi</p>
        <h1 class="text-4xl font-bold mb-6">100</h1>
        
        <div class="bg-gray-100 rounded-lg overflow-hidden">
            <div class="grid grid-cols-2">
                <div class="text-center py-3 border-r border-gray-200">
                    <p class="text-sm font-medium text-green-600">Transaksi Berhasil</p>
                    <h2 class="text-4xl font-bold text-green-700 mt-2">50</h2>
                </div>
                <div class="text-center py-3">
                    <p class="text-sm font-medium text-red-600">Transaksi Gagal</p>
                    <h2 class="text-4xl font-bold text-red-700 mt-2">50</h2>
                </div>
            </div>
        </div>
    </div>
            </div>

            <div class=" bg-white rounded-lg shadow-gray-500 shadow-sm p-5 h-96">
            <p class="text-gray-500 mb-2">Total Pengguna Aktif</p>
        <h1 class="text-4xl font-bold mb-4">100</h1>
    
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Daftar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Tuhu Pangestu
                        </th>
                        <td class="px-6 py-4">
                            05-07-2024
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Zanuar Rikza
                        </th>
                        <td class="px-6 py-4">
                            25-07-2024
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            </div>

            <div class=" bg-white col-span-2 rounded-lg shadow-sm shadow-gray-500">
                <div class="flex items-center p-5">
                    <h1 class="font-Roboto-bold">Hisori Transaksi</h1>
                    <div class="border h-7 ml-auto p-2 flex items-center gap-2">
                        <i class="fas fa-search text-gray-500"></i>
                        <input type="text" class="" placeholder="search">
                    </div>
                </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nominal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Metode
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Tuhu Pangestu
                        </th>
                        <td class="px-6 py-4">
                            Rp 100.000
                        </td>
                        <td class="px-6 py-4">
                            pending
                        </td>
                        <td class="px-6 py-4">
                            Qris
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Danendra Mahardika
                        </th>
                        <td class="px-6 py-4">
                            Rp 200.000
                        </td>
                        <td class="px-6 py-4">
                            Sucsess
                        </td>
                        <td class="px-6 py-4">
                            BCA
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Zanuar Rikza Aditiya
                        </th>
                        <td class="px-6 py-4">
                            Rp 150.000
                        </td>
                        <td class="px-6 py-4">
                            dibatalkan
                        </td>
                        <td class="px-6 py-4">
                            BNI
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

            </div>
        </div>
        </div>
        
        <!-- <div class="h-full w-full overflow-y-scroll">
            <div id="calendarBot"></div>
        </div> -->
    </main>


    <script>
        const calendarElement = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarElement,{
            initialView: "dayGridMonth"
        });
        calendar.render();
    </script>
</body>
<?php require './views/Components/Foot.php' ?>