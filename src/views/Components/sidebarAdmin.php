<aside class="w-64 bg-gray-100 shadow-md">
  <!-- Header -->
  <div class="p-4 border-b">
    <div class="flex items-center space-x-3">
      <div class="w-10 h-10 rounded-full flex items-center">
        <img src="<?= ASSETS ?>image/logo.png" alt="logo">
      </div>
      <div>
        <p class="text-sm font-medium text-gray-800"><?= $_SESSION['username_admin'] ?></p>
      </div>
    </div>
  </div>
  <!-- Menu -->
  <nav class="p-4 space-y-2">
    <a href="/<?= PROJECT_NAME ?>/admin/dashboard" class="flex <?= ($data['active-menu'] == "dashboard") ?  'bg-gray-200' : '' ?> items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
      <i class="fas fa-dashboard text-warna-second text-[15px]"></i>
      <span class="ml-3">
        Dash Board
      </span>
    </a>
    <a href="/<?= PROJECT_NAME ?>/admin/akunuser" class="flex <?= ($data['active-menu'] == "akunuser") ?  'bg-gray-200' : '' ?> items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
      <i class="fas fa-user text-warna-second text-[15px]"></i>
      <span class="ml-3">
        Daftar Akun
      </span>
    </a>
    <a href="/<?= PROJECT_NAME ?>/admin/pengumuman" class="flex <?= ($data['active-menu'] == "pengumuman") ?  'bg-gray-200' : '' ?> items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
      <i class="fas fa-bell text-warna-second text-[15px]"></i>
      <span class="ml-3">
        Pengumuman
      </span>
    </a>
    <!-- sub menu pengumuman -->
    <div class=" text-sm font-medium text-gray-600 ml-5 px-1 border-l-2 border-warna-second   mt-0">
      <a href="/<?= PROJECT_NAME ?>/admin/logpengumuman" class="ml-1">
        <i class="far fa-clipboard ml-2"></i>
        <span class="ml-1">
          Log Pengumuman
        </span>
      </a>
    </div>
    <a href="/<?= PROJECT_NAME ?>/admin/laporan" class="flex <?= ($data['active-menu'] == "laporan") ?  'bg-gray-200' : '' ?> items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
      <i class="fas fa-file text-warna-second text-[15px]"></i>
      <span class="ml-3">
        Laporan
      </span>
    </a>
    <div class=" text-sm font-medium text-gray-600 ml-5 px-1 border-l-2 border-warna-second   mt-0">
      <a href="/<?= PROJECT_NAME ?>/admin/laporan" class="ml-1">
        <i class="far fa-file ml-2"></i>
        <span class="ml-1">
          Detail Laporan
        </span>
      </a>
    </div>
    <a href="/<?= PROJECT_NAME ?>/admin/berita" class="flex <?= ($data['active-menu'] == "berita") ?  'bg-gray-200' : '' ?> items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
      <i class="fas fa-newspaper text-warna-second text-[15px]"></i>
      <span class="ml-3">
        Berita
      </span>
    </a>
    <div class=" text-sm font-medium text-gray-600 ml-5 px-1 border-l-2 border-warna-second   mt-0">
      <a href="/<?= PROJECT_NAME ?>/admin/tambahBerita" class="ml-1">
        <i class="far fa-newspaper ml-2"></i>
        <span class="ml-1">
          Tambah Berita
        </span>
      </a>
    </div>
    <a href="/<?= PROJECT_NAME ?>/admin/pertanyaan" class="flex <?= ($data['active-menu'] == "pertanyaan") ?  'bg-gray-200' : '' ?> items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
      <i class="fas fa-question text-warna-second text-[15px]"></i>
      <span class="ml-3">
        Pertanyaan
      </span>
    </a>

    <div class=" text-sm font-medium text-gray-600 ml-5 px-1 border-l-2 border-warna-second   mt-0">
      <a href="/<?= PROJECT_NAME ?>/admin/pertanyaan" class="ml-1">
        <i class="far fa-bell text-black ml-2"></i>
        <span class="ml-1">
          Balas Pertanyaan
        </span>
      </a>
    </div>

    <button onclick="showLogoutModal()" class="flex items-center px-3 py-2 text-sm font-medium text-warna-second rounded-lg">
          <i class="fas fa-right-from-bracket text-warna-second text-[15px]"></i>
          <span class="ml-3">
              Log Out
          </span>
    </button>

    <div id="logoutModal" class="absolute inset-0 z-50 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-md shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Konfirmasi Logout</h2>
            <p>Apakah Anda yakin ingin logout?</p>
            <div class="mt-4 flex justify-between">
                <button onclick="confirmLogout()" class="bg-red-500 text-white px-4 py-2 rounded-md">Logout</button>
                <button onclick="cancelLogout()" class="bg-gray-500 text-white px-4 py-2 rounded-md">Batal</button>
            </div>
        </div>
    </div>

  </nav>
  <script>
      // Menampilkan modal konfirmasi logout
      function showLogoutModal() {
          document.getElementById('logoutModal').classList.remove('hidden');
      }

      // Menangani klik pada tombol Batal (menutup modal)
      function cancelLogout() {
          document.getElementById('logoutModal').classList.add('hidden');
      }

      // Menangani klik pada tombol Logout (melakukan aksi logout)
      function confirmLogout() {
          // Lakukan aksi logout, misalnya mengarahkan ke halaman logout
          window.location.href = '/<?= PROJECT_NAME ?>/admin/logout';  // Ganti dengan URL logout sesuai aplikasi Anda
      }
  </script>
</aside>