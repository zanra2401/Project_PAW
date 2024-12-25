<?php require './views/Components/Head.php' ?>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <?php 
    if (isset($_SESSION['errors']))
    {
      $hellper->flashAlert("Gagal Login", $_SESSION['errors']);
      unset($_SESSION['errors']);
    }
  ?>
  <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-sm" style="padding-left: 20px;padding-right: 20px">
    <div class="flex justify-center mb-4">
        <img class="w-16 h-16" src="<?= ASSETS?>image/centang.png" alt="Illustration" class="w-2/3">
    </div>
    <h4 class=" font-bold text-orange-500 text-center" style="font-size: 22px;margin-bottom: 10px">Kode telah dikirim</h4>
    <p class="text-gray-700 text-center mb-6 leading-relaxed whitespace-pre-line">
    Kami telah mengirimkan kode ke email Anda Jika tidak menemukannya di kotak masuk harap periksa folder spam atau junk
    </p>
    <form method="post" action="/<?= PROJECT_NAME ?>/account/isCodeMatch" class="flex flex-col items-center">
        <input 
          type="text" 
          id="kode" 
          name="verif_code"
          placeholder="Masukan kode" 
          class="w-64 py-3 px-6 text-center text-black border font-semibold border-[#c48d6e] rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400"
          style="margin-bottom: 15px"
          required
        />   
      <input type="text" name="id_user" value="<?= $data['id_user'] ?>" hidden>
      <input type="text" name="email_user" value="<?= $data['email_user'] ?>" hidden>
      <button type="submit" class="w-64 text-white py-2 px-4 rounded-md hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2" style="background-color:#83493d;">
        Lanjut
      </button>
      <button onclick="window.history.back()" class="w-full mt-4 hover:text-gray-500">
          Batal
      </button>
    </form>
  </div>
</body>
<?php require './views/Components/Foot.php' ?>