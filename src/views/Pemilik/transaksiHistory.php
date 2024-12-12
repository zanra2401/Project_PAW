<?php require "./views/Components/Head.php" ?>
    <body class="h-screen font-Roboto-normal overflow-x-hidden">
        <?php require "./views/Components/NavBar.php" ?>
        <main class="w-[90%] mx-auto h-fit mt-5">
            <div class="mb-10 px-5">
                <span><input class="px-2 border-2 border-base-color  rounded-md py-1" type="text" name="" placeholder="Pembayar, Status" id=""></span>
                <button onclick="showFilterModal()" class="p-2 px-3 hover:cursor-pointer bg-base-color rounded-md text-white">
                    <i class="fas fa-arrow-down-wide-short"></i>
                </button>
            </div>
            <div class="list-transaksi w-100 h-fit flex flex-col gap-2 items-center">
                <div class="w-full h-[80px] px-5 py-3 hover:bg-slate-200 flex items-center hover:rounded-md hover:cursor-pointer border-b border-gray-300 hover:border-none">
                    <span class="bg-warna-second p-3 h-full aspect-square flex items-center w-fit rounded-md">
                        <i class="fas text-slate-200 fa-money-bill text-[30px]"></i>
                    </span>
                    <span class="ml-5 h-full flex justify-between flex-col">
                        <p><span class="text-gray-700">Pembayar: </span> <span class="text-gray-800">Zanuar</span></p>
                        <p><span class="text-gray-700">Status: </span> <span class="text-yellow-600">Pending</span> <i class="fas text-rose-700 fa-close"></i></p>
                    </span>
                    <span class="ml-auto text-end flex flex-col justify-between h-full">
                        <p class="font-Roboto-bold text-xl text-gray-800">Rp. 20.000,00</p>
                        <p class="text-gray-800">24-january-2005</p>
                    </span>
                </div>
                <div class="w-full h-[80px] px-5 py-3 hover:bg-slate-200 flex items-center hover:rounded-md hover:cursor-pointer border-b border-gray-300 hover:border-none">
                    <span class="bg-warna-second p-3 h-full aspect-square flex items-center w-fit rounded-md">
                        <i class="fas text-slate-200 fa-money-bill text-[30px]"></i>
                    </span>
                    <span class="ml-5 h-full flex justify-between flex-col">
                        <p><span class="text-gray-700">Pembayar: </span> <span class="text-gray-800">Zanuar</span></p>
                        <p><span class="text-gray-700">Status: </span> <span class="text-yellow-600">Pending</span> <i class="fas text-rose-700 fa-close"></i></p>
                    </span>
                    <span class="ml-auto text-end flex flex-col justify-between h-full">
                        <p class="font-Roboto-bold text-xl text-gray-800">Rp. 20.000,00</p>
                        <p class="text-gray-800">24-january-2005</p>
                    </span>
                </div>
            </div>


            <!-- MODAL -->

            <div id="filterModal" class="h-screen w-screen hidden flex items-center justify-center bg-gray-700 bg-opacity-50 absolute top-0 left-0">
                <button onclick="hideFilterModal()" class="absolute top-5 right-5">
                    <i class="fas fa-close text-3xl text-red-800"></i>
                </button>
                <div class="w-[600px] h-3/4 bg-white rounded-md p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Filter Transaksi</h2>
                    <form class="space-y-4">
                        <!-- Filter Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                            <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Semua</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Selesai</option>
                                <option value="canceled">Dibatalkan</option>
                            </select>
                        </div>

                        <!-- Filter Tanggal -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Range Tanggal</label>
                            <div class="flex items-center space-x-2">
                                <input type="date" id="tanggal-awal" name="tanggal-awal" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tanggal Awal">
                                <span class="text-gray-500">sampai</span>
                                <input type="date" id="tanggal-akhir" name="tanggal-akhir" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tanggal Akhir">
                            </div>
                        </div>

                        <!-- Filter Range Harga -->
                        <div>
                            <label for="range-harga" class="block text-sm font-medium text-gray-600 mb-1">Range Harga</label>
                            <div class="flex items-center space-x-2">
                                <input type="number" id="harga-min" name="harga-min" placeholder="Min" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <span class="text-gray-500">-</span>
                                <input type="number" id="harga-max" name="harga-max" placeholder="Max" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <!-- Filter Pembayar -->
                        <div>
                            <label for="pembayar" class="block text-sm font-medium text-gray-600 mb-1">Pembayar</label>
                            <input type="text" id="pembayar" name="pembayar" placeholder="Nama Pembayar" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mt-4">
                            <button type="submit" class="w-full bg-base-color text-white py-2 rounded-md hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-base-color">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>

    <script>
        const filterModal = document.getElementById("filterModal");
        function showFilterModal()
        {
            filterModal.classList.toggle("hidden");
        }

        function hideFilterModal()
        {
            filterModal.classList.toggle("hidden");
        }
    </script>
<?php require "./views/Components/Foot.php" ?>