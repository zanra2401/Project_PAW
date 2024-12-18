<?php require './views/Components/Head.php' ?>

<body class="font-roboto bg-grey-200 text-black">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-3xl font-bold text-gray-800">Pemilik Kost</h1>
        </div>
    </nav>

    <!-- Main Container dengan Background Putih Seluruh Halaman -->
    <div class="bg-gray-200 min-h-screen flex items-center justify-center">

        <!-- Grid Menu Section dengan tata letak penuh -->
        <div class="max-w-6xl w-full">

            <!-- Grid untuk Menu dengan 3 atas dan 3 bawah -->
            <div class="grid grid-cols-3 gap-12 p-12">

                <!-- Menu 1: Chat -->
                <a href="/chat.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-16 hover:bg-gray-400 transition shadow-lg">
                    <img src="https://img.icons8.com/ios-filled/80/000000/chat--v1.png" alt="Chat"
                        class="h-20 w-20 mb-6">
                    <p class="text-2xl font-semibold">Chat</p>
                </a>

                <!-- Menu 2: Tambah Kost -->
                <a href="/tambahkost.php"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-16 hover:bg-gray-400 transition shadow-lg">
                    <img src="https://img.icons8.com/ios-filled/80/000000/plus-math.png" alt="Tambah Kost"
                        class="h-20 w-20 mb-6">
                    <p class="text-2xl font-semibold">Tambah Kost</p>
                </a>

                <!-- Menu 3: Ulasan -->
                <a href="/ulasan.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-16 hover:bg-gray-400 transition shadow-lg">
                    <img src="https://img.icons8.com/ios-filled/80/000000/comments.png" alt="Ulasan"
                        class="h-20 w-20 mb-6">
                    <p class="text-2xl font-semibold">Ulasan</p>
                </a>

                <!-- Menu 4: Mengelola Kost -->
                <a href="/mengelola-kost.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-16 hover:bg-gray-400 transition shadow-lg">
                    <img src="https://img.icons8.com/ios-filled/80/000000/edit.png" alt="Mengelola Kost"
                        class="h-20 w-20 mb-6">
                    <p class="text-2xl font-semibold">Mengelola Kost</p>
                </a>

                <!-- Menu 5: Promosi -->
                <a href="/promosi.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-16 hover:bg-gray-400 transition shadow-lg">
                    <img src="https://img.icons8.com/ios-filled/80/000000/megaphone.png" alt="Promosi"
                        class="h-20 w-20 mb-6">
                    <p class="text-2xl font-semibold">Promosi</p>
                </a>

                <!-- Menu 6: Statistik -->
                <!-- Menu 6: Pembayaran -->
                <a href="/pembayaran.html"
                    class="flex flex-col items-center bg-gray-300 rounded-lg p-16 hover:bg-gray-400 transition shadow-lg">
                    <img src="https://img.icons8.com/ios-filled/80/000000/money.png" alt="Pembayaran"
                        class="h-20 w-20 mb-6">
                    <p class="text-2xl font-semibold">Pembayaran</p>
                </a>


            </div>

        </div>
    </div>

    <?php require "./views/Components/Foot.php" ?>
</body>