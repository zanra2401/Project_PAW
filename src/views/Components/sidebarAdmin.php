<aside class="w-64 bg-gray-100 shadow-md">
      <!-- Header -->
      <div class="p-4 border-b">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
          <div>
            <p class="text-sm font-medium text-gray-800">Kevin Dukkon</p>
            <p class="text-xs text-gray-500">hey@kevdu.co</p>
          </div>
          <button class="ml-auto text-gray-500 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 14l8-8H4z"/>
            </svg>
          </button>
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
                  <i class="fas fa-clipboard ml-2"></i>
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
                  <i class="fas fa-clipboard ml-2"></i>
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
                  <i class="fas fa-clipboard ml-2"></i>
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
        <div class=" text-sm font-medium text-gray-600 px-3 mt-0">
            <div class="ml-[7.5px] relative">
                <a href="/<?= PROJECT_NAME ?>/admin/pertanyaan" class="ml-5">Balas Pertanyaan</a>
                <div class="absolute rounded-t-md inline-block h-1/2 left-0 top-0 bg-gray-600 w-[2px]"></div>
                <div class="absolute inline-block rounded-r-md h-[3px] left-0  bg-gray-600 w-[10px] top-1/2"></div>
            </div>
        </div>
      </nav>
    </aside>
