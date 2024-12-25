<?php require './views/Components/Head.php' ?>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-sm">
    <h1 class="text-2xl font-bold text-orange-500 mb-4 text-center">Lupa Password</h1>
    <p class="text-gray-700 text-center mb-6">
      Masukkan alamat email Anda, kami akan mengirimkan kode untuk mengatur ulang kata sandi Anda.
    </p>
    <form method="POST" action="/<?= PROJECT_NAME ?>/account/lupapassword">
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email"
          placeholder="Masukkan Email" 
          class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
          required
        />
      </div>
      <button type="submit" class="w-full text-white py-2 px-4 rounded-md hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2" style="background-color:#83493d;">
        Lanjut
      </button>
      <button onclick="window.history.back()" class="w-full mt-4 hover:text-gray-500">
          Batal
      </button>
    </form>
  </div>
</body>
<?php require './views/Components/Foot.php' ?>
