<?php
require './views/Components/Head.php';
?>
<?php require_once './helper/helper.php' ?>


<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <?php 
            if (isset($_SESSION["error-reset"]))
            {
                $hellper->flashAlert($_SESSION["error-reset"]); 
                unset($_SESSION["error-reset"]);
            }
    ?>
    
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-sm">
        <h1 class="text-2xl font-bold text-orange-500 mb-4 text-center">Reset Password</h1>
        <p class="text-gray-700 text-center mb-6">
            Masukkan password baru Anda dan tulis ulang password baru untuk melanjutkan.
        </p>

        <!-- Tampilkan pesan error jika ada -->
        <?php if (isset($errorMessage)): ?>
        <div class="bg-red-100 text-red-800 p-2 mb-4 rounded">
            <?= $errorMessage ?>
        </div>
        <?php endif; ?>

        <!-- Tampilkan pesan sukses setelah password berhasil diubah -->
        <?php if (isset($responseMessage)): ?>
        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
            <?= $responseMessage ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="/<?= PROJECT_NAME ?>/account/resetpassword">
            <div class="mb-4">
                <label for="new-password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                <input type="password" id="new-password" name="new-password" placeholder="Masukkan Password Baru"
                    class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
                     />
            </div>

            <input type="text" name="token" value="<?= $data['token'] ?>" hidden>
            <input type="text" name="id" value="<?= $data['id_user'] ?>" hidden>

            <div class="mb-4">
                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Tulis Ulang Password
                    Baru</label>
                <input type="password" id="confirm-password" name="confirm-password"
                    placeholder="Tulis Ulang Password Baru"
                    class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
                     />
            </div>

            <button type="submit"
                class="w-full text-white py-2 px-4 rounded-md hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2" style="background-color:#83493d;">
                Simpan
            </button>
            <button onclick="window.history.back()" class="w-full mt-4 hover:text-gray-500">
                Batal
            </button>

        </form>
    </div>
</body>

<?php require './views/Components/Foot.php';