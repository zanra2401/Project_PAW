<?php require './views/Components/Head.php' ?>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-sm" style="padding-left: 20px;padding-right: 20px">
    <div class="flex justify-center mb-4">
        <img class="w-16 h-16" src="./public/assets/image/centang hijau.png" alt="Illustration" class="w-2/3">
    </div>
    <h4 class=" font-bold text-orange-500 text-center" style="font-size: 22px;margin-bottom: 17px">Kode telah dikirim</h4>
    <p class="text-gray-700 text-center mb-6">
    Kami telah mengirimkan kode ke email Anda.
    Jika tidak menemukannya di kotak masuk,
    harap periksa folder spam atau junk
    </p>
    <form>
      <div class="mb-4 flex justify-center">
        <input 
          type="text" 
          id="kode" 
          placeholder="Masukan kode" 
          class="w-64 py-3 px-6 text-center text-black border font-semibold border-[#c48d6e] rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#c48d6e]"
          style="margin-bottom: 10px"
          required
        />
      </div>
      <div class="flex justify-center">
        <button type="submit" class="w-40 text-white py-2 px-4 rounded-md bg-warna-second hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2">
          Lanjut
        </button>
      </div>
    </form>
  </div>
</body>
<?php require './views/Components/Foot.php' ?>