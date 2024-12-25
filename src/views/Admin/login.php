<?php require './views/Components/Head.php'; ?>
<?php require_once './helper/helper.php' ?>

  <?php 
    if (isset($_SESSION['errors']))
    {
      $hellper->flashAlert("Gagal Login", $_SESSION['errors']);
      unset($_SESSION['errors']);
    }

    if (isset($_SESSION['success']))
    {
        $hellper->flashSuccess("berhasil", $_SESSION['success']);
        unset($_SESSION['success']);
    }
  ?>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Admin Login</h2>
        <form action="/<?= PROJECT_NAME ?>/admin/loginadmin" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="username" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"  placeholder="password" required>
            </div>
            <button type="submit" class="w-full text-white py-2 px-4 rounded-md hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2 " style="background-color:#83493d;">
                Masuk
            </button>
        </form>
    </div>
</body>
<?php require './views/Components/Foot.php' ?>