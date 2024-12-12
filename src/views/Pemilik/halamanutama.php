<?php require './views/Components/Head.php' ?>

<body class="font-roboto bg-grey-200 text-black">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Pemilik Kost</h1>
        </div>
    </nav>

    <!-- Main Container dengan Background Putih Seluruh Halaman -->
    <div>

        <!-- Grid Menu Section dengan tata letak penuh -->
        <div>

            <!-- Grid untuk Menu dengan 3 atas dan 3 bawah -->
            <div class="grid grid-cols-3 gap-8 p-8 grid-rows-2">

                <!-- Menu 1: Chat -->
                <a href="/chat.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-10 hover:bg-gray-400 transition shadow-md w-32 h-32">
                    <img src="https://img.icons8.com/ios-filled/50/000000/chat--v1.png" alt="Chat"
                        class="h-14 w-14 mb-2">
                    <p class="text-lg font-semibold">Chat</p>
                </a>

                <!-- Menu 2: Tambah Kost -->
                <a href="/tambahkost.php"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-10 hover:bg-gray-400 transition shadow-md w-32 h-32">
                    <img src="https://img.icons8.com/ios-filled/50/000000/plus-math.png" alt="Tambah Kost"
                        class="h-14 w-14 mb-2">
                    <p class="text-lg font-semibold">Tambah Kost</p>
                </a>

                <!-- Menu 3: Ulasan -->
                <a href="/ulasan.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-10 hover:bg-gray-400 transition shadow-md w-32 h-32">
                    <img src="https://img.icons8.com/ios-filled/50/000000/comments.png" alt="Ulasan"
                        class="h-14 w-14 mb-2">
                    <p class="text-lg font-semibold">Ulasan</p>
                </a>

                <!-- Menu 4: Mengelola Kost -->
                <a href="/mengelola-kost.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-10 hover:bg-gray-400 transition shadow-md w-32 h-32">
                    <img src="https://img.icons8.com/ios-filled/50/000000/edit.png" alt="Mengelola Kost"
                        class="h-14 w-14 mb-2">
                    <p class="text-lg font-semibold">Mengelola Kost</p>
                </a>

                <!-- Menu 5: Promosi -->
                <a href="/promosi.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-10 hover:bg-gray-400 transition shadow-md w-32 h-32">
                    <img src="https://img.icons8.com/ios-filled/50/000000/megaphone.png" alt="Promosi"
                        class="h-14 w-14 mb-2">
                    <p class="text-lg font-semibold">Promosi</p>
                </a>

                <!-- Menu 6: Statistik -->
                <a href="/statistik.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-10 hover:bg-gray-400 transition shadow-md w-32 h-32">
                    <img src="https://img.icons8.com/ios-filled/50/000000/combo-chart.png" alt="Statistik"
                        class="h-14 w-14 mb-2">
                    <p class="text-lg font-semibold">Statistik</p>
                </a>

            </div>

        </div>
    </div>

    <?php require "./views/Components/Foot.php" ?>
</body>