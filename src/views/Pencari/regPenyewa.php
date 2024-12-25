<?php require './views/Components/Head.php' ?>
<?php require_once './helper/helper.php' ?>
<style>
    .alert {
        animation: message 0.5s ease 1;
        top: 10px;
    }

    @keyframes message {
        0% {
            top: -100%;
        }

        50% {
            top: -50%;
        }

        100% {
            top: 10px;
        }
    }
</style>
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
            <h2 class="text-3xl font-semibold text-base-color  mb-6">Daftar Penyewa</h2>
            <form action="/<?= PROJECT_NAME ?>/account/registerAkunPencari" method="post">
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" 
                    class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" 
                    class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password" 
                           class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">
                </div>
                <div class="mb-4">
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Ulangi Password</label>
                    <input type="password" name="password-verif" id="confirm-password" placeholder="Masukkan kembali password" 
                    class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">
                </div>


                <button type="submit" class="w-full text-white py-2 px-4 rounded-md hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2 " style="background-color:#83493d;">
                    Daftar
                </button>
                <!-- <button onclick="window.history.back()" class="w-full mt-4 hover:text-gray-500">
                    Batal
                </button> -->
                <a href="javascript:history.back()" class="w-full block mt-4 text-center hover:text-gray-500">
                    Batal
                </a>
            </form>
            <div class="mt-4 text-center text-sm">
                Sudah punya akun? <a href="/project_paw/account/login" class="text-base-color  font-medium hover:underline">Masuk disini</a>
            </div>
        </div>
        <!-- Image Section -->
        <div class="flex-1 bg-cover bg-center">
            <img class="w-full" style="margin-top:60px" src="<?= PUBLIC_FOLDER?>/assets/image/penyewa.png" alt="Illustration">
        </div>
    </div>

</body>
<?php require './views/Components/Foot.php' ?>
