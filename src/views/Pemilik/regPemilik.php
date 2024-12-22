<?php require './views/Components/Head.php' ?>
<?php require_once './helper/helper.php' ?>

<body class="bg-blue-50 flex items-center justify-center min-h-screen">
    <?php 
            if (isset($_SESSION["errors"]))
            {
                $hellper->flashAlert("Gagal Registrasi", $_SESSION["errors"]); 
                unset($_SESSION["errors"]);
            }
    ?>
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden w-[800px]">
        <!-- Form Section -->
        <div class="flex-1 p-6">
            <h2 class="text-3xl font-semibold text-base-color  mb-6">Daftar Pemilik</h2>
            <!-- tuhu salah ganti ini -->
            <form action="/<?= PROJECT_NAME ?>/account/registerAkunPemilik" method="post">
                <div class="mb-4">
                    <label for="nama"  class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="nama" placeholder="Masukkan nama lengkap" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                <div class="mb-4">
                    <label for="nomor" class="block text-sm font-medium text-gray-700">Nomor Handphone</label>
                    <input type="text"  name="no-hp" id="nomor" placeholder="Masukkan nomor handphone" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan email" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                <div class="mb-4">
                    <label for="confirm-password"  class="block text-sm font-medium text-gray-700">Ulangi Password</label>
                    <input type="password" name="password-verif" id="confirm-password" placeholder="Masukkan kembali password" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                <button type="submit" class="w-full text-white py-2 px-4 rounded-md bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2">
                    Daftar
                </button>
            </form>
            <div class="mt-4 text-center text-sm">
                Sudah punya akun? <a href="/project_paw/account/login" class="text-base-color  font-medium hover:underline">Masuk disini</a>
            </div>
        </div>
        <!-- Image Section -->
        <div class="flex-1 bg-cover bg-center">
            <img class="w-full" style="margin-top:90px; padding-right: 30px;" src="<?= PUBLIC_FOLDER?>/assets/image/penyewa.png" alt="Illustration">
        </div>
    </div>
</body>
<?php require './views/Components/Foot.php' ?>
