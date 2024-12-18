<?php
require './views/Components/Head.php';
?>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
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
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900"
                    required />
            </div>

            <div class="mb-4">
                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Tulis Ulang Password
                    Baru</label>
                <input type="password" id="confirm-password" name="confirm-password"
                    placeholder="Tulis Ulang Password Baru"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900"
                    required />
            </div>

            <button type="submit"
                class="w-full text-[#000000] py-2 px-4 rounded-md bg-[#68422d] hover:bg-[#4e2f22] focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2">
                Simpan
            </button>
        </form>
    </div>
</body>

<?php require './views/Components/Foot.php';