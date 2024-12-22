<aside class="w-52 bg-gray-100 shadow-md">
      <!-- Header -->
      <div class="p-4 border-b">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-gray-200 rounded-full"><img src="<?= "/" . PROJECT_NAME . "/" . $foto_profile?>" alt="" class="rounded-full w-full h-full"></div>
          <div>
            <p class="text-sm font-medium text-gray-800"><?= $data['data_user'][0]['username_user']?></p>
            <p class="text-xs text-gray-500"><?= $data['data_user'][0]['email_user']?></p>
          </div>
        </div>
      </div>
      
      
      <!-- Menu -->
      <nav class="p-4 space-y-2">
        <a href="/<?= PROJECT_NAME ?>/pemilik/dashboard" class="flex items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
          <i class="fas fa-chart-simple text-warna-third text-[15px]"></i>
          <span class="ml-3">
            Dash Board
          </span>
        </a>
        <a href="/<?= PROJECT_NAME ?>/pemilik/Profile" class="flex items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
          <i class="fas fa-user text-warna-third text-[15px]"></i>
          <span class="ml-3">
              Profile
          </span>
        </a>
        <a href="/<?= PROJECT_NAME ?>/pemilik/kosts" class="flex items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
          <i class="fas fa-hotel text-warna-third text-[15px]"></i>
          <span class="ml-3">
              Kost
          </span>
        </a>
        <!-- sub menu pengumuman -->
        <div class=" text-sm font-medium text-gray-600 ml-5 px-1 border-l-2 border-warna-second   mt-0">
                <a href="/<?= PROJECT_NAME ?>/pemilik/tambahkost" class="ml-1">
                  <i class="fas fa-plus-square ml-2"></i>
                  <span class="ml-1">
                    Tambah Kost
                  </span>
                </a>
        </div>

        <a href="/<?= PROJECT_NAME ?>/pemilik/chat" class="flex items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
          <i class="far fa-message text-warna-third text-[15px]"></i>
          <span class="ml-3">
              Chat
          </span>
        </a>

        <button onclick="showLogoutModal()" class="flex items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
          <i class="fas fa-right-from-bracket text-warna-third text-[15px]"></i>
          <span class="ml-3">
              Log Out
          </span>
        </button>

      </nav>

      <div id="logoutModal" class="fixed inset-0 z-40 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
          <div class="bg-white p-6 rounded-md shadow-lg w-1/3">
              <h2 class="text-xl font-bold mb-4">Konfirmasi Logout</h2>
              <p>Apakah Anda yakin ingin logout?</p>
              <div class="mt-4 flex justify-between">
                  <button onclick="confirmLogout()" class="bg-red-500 text-white px-4 py-2 rounded-md">Logout</button>
                  <button onclick="cancelLogout()" class="bg-gray-500 text-white px-4 py-2 rounded-md">Batal</button>
              </div>
          </div>
      </div>

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
          window.location.href = '/<?= PROJECT_NAME ?>/account/logout';  // Ganti dengan URL logout sesuai aplikasi Anda
      }
  </script>
    </aside>
