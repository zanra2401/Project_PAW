<?php require './views/Components/Head.php' ?>
<body class="bg-gray-100 min-h-screen">
    <div class="h-screen w-screen bg-white shadow-lg flex rounded-lg overflow-hidden">
        <!-- Left Side Image Section -->
        <div class="w-1/2 p-10 flex items-center justify-center bg-gray-100">
            <img src="https://via.placeholder.com/250" alt="Illustration" class="w-2/3">
        </div>

        <!-- Right Side Form Section -->
        <div class="w-1/2 bg-blue-50 p-8">
            <!-- Logo -->
            <div class="mb-8">
                <h1 class="text-blue-600 text-2xl font-bold">CARI KOST</h1>
            </div>

            <!-- Form Title -->
            <h2 class="text-orange-500 text-3xl font-semibold mb-6">Masuk</h2>

            <!-- Login Form -->
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="username">ID Username</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200" id="username" type="text" placeholder="Masukkan ID">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">Password</label>
                    <div class="relative">
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200" id="password" type="password" placeholder="Password">
                        <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.94 10c1.73-3.34 5.39-6 8.06-6 2.67 0 6.33 2.66 8.06 6-1.73 3.34-5.39 6-8.06 6-2.67 0-6.33-2.66-8.06-6z" />
                                <path d="M12 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Forgot Password Link -->
                <div class="text-right mb-4">
                    <a href="#" class="text-blue-500 text-sm">Lupa Password?</a>
                </div>

                <!-- Login Button -->
                <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition duration-300">Masuk</button>
            </form>

            <!-- Register Link -->
            <p class="mt-4 text-center text-sm text-gray-600">
                Belum punya akun? <a href="#" class="text-blue-500 font-semibold">Daftar disini</a>
            </p>
        </div>
    </div>
</body>
<?php require './views/Components/Foot.php' ?>