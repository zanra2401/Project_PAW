<?php require './views/Components/Head.php' ?>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
    <div class="flex justify-center mb-6" style="margin-bottom: 30px">
<<<<<<< HEAD
        <img class="w-15 h-10" src="<?= PUBLIC_FOLDER ?>/assets/image/logo.png" alt="Illustration" class="w-2/3">
    </div>
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6" style="margin-bottom: 40px">Masuk Akun</h2>
    <form>
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700">ID Username</label>
        <input type="username" id="username" class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan username" required style="background-color: white;"/>
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan password" required style="background-color: white;"/>
      </div>
      <div class="flex items-center justify-between mb-6">
        <a href="#" class="text-sm text-base-color hover:underline">Lupa password?</a>
=======
        <img class="w-15 h-10" src="./public/assets/image/logo.png" alt="Illustration" class="w-2/3">
    </div>
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6" style="margin-bottom: 40px">Masuk Akun</h2>
    <form action="proses_login.php" method="post">
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700">ID Username</label>
        <input type="username" id="username" name="id_username" class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan username" required style="background-color: white;"/>
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan password" required style="background-color: white;"/>
      </div>
      <div class="flex items-center justify-between mb-6">
        <a href="lupapassword.php" class="text-sm text-base-color hover:underline">Lupa password?</a>
>>>>>>> nabila
      </div>
      <button type="submit" class="w-full text-white py-2 px-4 rounded-md bg-warna-second hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2">
        Masuk
      </button>
    </form>
    <p class="mt-6 text-center text-sm text-black-600">
      Belum punya akun? <a href="#" class="text-base-color font-medium hover:underline">buat disini</a>
    </p>
  </div>
</body>
<?php require './views/Components/Foot.php' ?>