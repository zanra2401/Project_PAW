<?php require './views/Components/Head.php' ?>
<body class="bg-blue-50 flex items-center justify-center min-h-screen">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden w-[800px]">
        <!-- Form Section -->
        <div class="flex-1 p-6">
            <h2 class="text-3xl font-semibold text-base-color  mb-6">Daftar Penyewa</h2>
            <form>
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                <div class="mb-4">
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Ulangi Password</label>
                    <input type="password" name="password-verif" id="confirm-password" placeholder="Masukkan kembali password" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                </div>
            </form>
            <button type="submit" class="w-full text-white py-2 px-4 rounded-md bg-warna-second hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2">
                Daftar
            </button>
            <div class="mt-4 text-center text-sm">
                Sudah punya akun? <a href="/project_paw/pencari/login" class="text-base-color  font-medium hover:underline">Masuk disini</a>
            </div>
        </div>
        <!-- Image Section -->
        <div class="flex-1 bg-cover bg-center">
            <img class="w-full" style="margin-top:60px" src="<?= PUBLIC_FOLDER?>/assets/image/penyewa.png" alt="Illustration">
        </div>
    </div>
</body>
<?php require './views/Components/Foot.php' ?>
