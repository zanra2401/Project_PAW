<?php require './views/Components/Head.php' ?>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-sm">
    <h1 class="text-2xl font-bold text-orange-500 mb-4 text-center">Reset Password</h1>
    <p class="text-gray-700 text-center mb-6">
      Masukkan alamat email Anda, kami akan mengirimkan kode untuk mengatur ulang kata sandi Anda.
    </p>
    <form>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input 
          type="email" 
          id="email" 
          placeholder="Masukkan Email" 
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900"
          required
        />
      </div>
      <button type="submit" class="w-full text-white py-2 px-4 rounded-md bg-warna-second hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2">
        Lanjut
      </button>
    </form>
  </div>
</body>
<?php require './views/Components/Foot.php' ?>