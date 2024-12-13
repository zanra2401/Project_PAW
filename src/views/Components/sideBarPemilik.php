<aside class="w-52 bg-gray-100 shadow-md">
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
        <a href="/<?= PROJECT_NAME ?>/pemilik/dashboard" class="flex items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
          <i class="fas fa-chart-simple text-warna-third text-[15px]"></i>
          <span class="ml-3">
              Dash Board
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
      </nav>
    </aside>
