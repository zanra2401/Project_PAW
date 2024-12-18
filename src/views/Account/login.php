<?php require './views/Components/Head.php' ?>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
        <div class="flex justify-center mb-6" style="margin-bottom: 30px">
            <img class="w-15 h-10" src="<?= PUBLIC_FOLDER ?>/assets/image/logo.png" alt="Illustration" class="w-2/3">
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6" style="margin-bottom: 40px">Masuk Akun</h2>
        <form action="/<?= PROJECT_NAME ?>/account/loginuser" method="post">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">ID Username</label>
                <input type="username" id="username" name="username"
                    class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan username" required style="background-color: white;" />
            </div>

    </div>
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password"
            class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukkan password" required style="background-color: white;" />
    </div>
    <div class="flex items-center justify-between mb-6">
        <a href="/project_paw/pencari/lupapassword" class="text-sm text-base-color hover:underline">Lupa
            password?</a>
    </div>
    <div class="mb-4">
        <label for="risetpassword" class="block text-sm font-medium text-gray-700">Ubah Password</label>
        <input type="risetpassword" id="risetpassword" name="risetpassword"
            class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukkan password baru" required style="background-color: white;" />

        <button type="submit"
            class="w-full text-white py-2 px-4 rounded-md bg-red-500  hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2 ">
            Masuk
        </button>
        </form>
        <p class="mt-6 text-center text-sm text-black-600">
            Belum punya akun? <button class="text-base-color font-medium hover:underline" id="buat_akun">buat
                disini</button>
        </p>
    </div>

    <div id="filter" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white shadow-lg rounded-lg p-6 w-[35%] relative transition-all duration-300 transform scale-0"
            id="contain_filter">
            <button class="absolute top-4 right-4 text-gray-700 hover:opacity-70" id="close_filter">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Masuk ke Cari Kos</h2>
            <p class="text-gray-600 mb-4">Saya ingin masuk sebagai</p>
            <div class="space-y-4">

                <a class="w-full flex items-center p-4 border rounded-lg hover:bg-gray-50 transition"
                    href="/project_paw/pencari/regPenyewa">
                    <img src="<?= PUBLIC_FOLDER?>/assets/image/penyewa.png" alt="Pencari Kos" class="w-28 mr-4">
                    <span class="text-gray-800 font-medium">Pencari Kos</span>
                </a>

                <a class="w-full flex items-center p-4 border rounded-lg hover:bg-gray-50 transition"
                    href="/project_paw/pemilik/regPemilik">
                    <img src="<?= PUBLIC_FOLDER?>/assets/image/pemilik2.png" alt="Pemilik Kos" class="w-28 mr-4">
                    <span class="text-gray-800 font-medium">Pemilik Kos</span>
                </a>
            </div>
        </div>
    </div>

    <script>
    const buat_akun = document.getElementById('buat_akun')
    const filter = document.getElementById('filter')
    const close_filter = document.getElementById('close_filter')

    buat_akun.addEventListener('click', () => {
        filter.classList.remove('hidden')
        setTimeout(() => {
            contain_filter.classList.remove('scale-0')
            contain_filter.classList.add('scale-100')
        }, 50)
    })


    close_filter.addEventListener('click', () => {
        contain_filter.classList.remove('scale-100')
        contain_filter.classList.add('scale-0')
        setTimeout(() => {
            filter.classList.add('hidden')
        }, 300)
    })
    </script>
</body>
<?php require './views/Components/Foot.php' ?>