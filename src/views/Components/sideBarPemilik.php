<aside class="w-52 bg-gray-100 shadow-md">
      <!-- Header -->
      <div class="p-4 border-b">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
          <div>
            <p class="text-sm font-medium text-gray-800">Kevin Dukkon</p>
            <p class="text-xs text-gray-500">hey@kevdu.co</p>
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

        <a href="/<?= PROJECT_NAME ?>/pemilik/Profile" class="flex items-center px-3 py-2 text-sm font-medium text-gray-800 rounded-lg">
          <i class="fas fa-right-from-bracket text-warna-third text-[15px]"></i>
          <span class="ml-3">
              Log Out
          </span>
        </a>

      </nav>
    </aside>
