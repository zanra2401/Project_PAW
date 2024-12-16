<?php require "./views/Components/Head.php" ?>

<body class="h-screen flex overflow-hidden">
  <?php require "./views/Components/sidebarAdmin.php" ?>
  <main class="p-5 w-full min-h-screen flex flex-col gap-3 overflow-y-scroll">
    <div class="container mx-auto p-6">
      <h1 class="text-2xl font-bold mb-4">Daftar Akun</h1>
      <div class="flex items-center justify-between mb-4">

        <div>
          <label class="block mb-1 font-medium text-gray-700">Category</label>
          <select id="categoryFilter" class="block w-40 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="all">All</option>
            <option value="Pemilik">Pemilik</option>
            <option value="User">User</option>
          </select>
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">Search</label>
          <input type="text" id="searchInput" class="block w-64 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

      </div>

      <!-- Table -->
      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase"></th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">ID User</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">User Name</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Email</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Role</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Action</th>
            </tr>
          </thead>
          <tbody id="accountTable" class="bg-white divide-y divide-gray-200">
            <?php
            $i = 1;
            foreach ($data['user'] as $user) {
              echo <<<EOD
                <tr data-category="Pemilik" data-blocked="false">
                  <td class="px-6 py-4"></td>
                  <td class="px-6 py-4">$i</td>
                  <td class="px-6 py-4">{$user['nama_user']}</td>
                  <td class="px-6 py-4">{$user['email_user']}</td>
                  <td class="px-6 py-4">{$user['role_user']}</td>
                  <td class="px-6 py-4">
              EOD;

              if ($user['status_akun'] == "unbanned") {
                echo <<<EOD
                      <a href="/project_paw/admin/ban/{$user['id_user']}" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Ban</a>
                    EOD;
              } else {
                echo <<<EOD
                      <a href="/project_paw/admin/unban/{$user['id_user']}" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-red-600">Un Ban</a>
                    EOD;
              }
              echo <<<EOD
                  </td>
                </tr>
              EOD;
              $i += 1;
            }
            ?>
            <!-- <tr data-category="User" data-blocked="false">
              <td class="px-6 py-4"></td>
              <td class="px-6 py-4">002</td>
              <td class="px-6 py-4">Nabilah Rizqi Amalia</td>
              <td class="px-6 py-4">Nabilah Rizqi Amalia@gmail.com</td>
              <td class="px-6 py-4">User</td>
              <td class="px-6 py-4">
                <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
              </td>
            </tr>
            <tr data-category="User" data-blocked="false">
              <td class="px-6 py-4"></td>
              <td class="px-6 py-4">003</td>
              <td class="px-6 py-4">Tuhu Pangestu</td>
              <td class="px-6 py-4">tuhu.pangestu@gmail.com</td>
              <td class="px-6 py-4">User</td>
              <td class="px-6 py-4">
                <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
              </td>
            </tr>
            <tr data-category="Pemilik" data-blocked="false">
              <td class="px-6 py-4"></td>
              <td class="px-6 py-4">004</td>
              <td class="px-6 py-4">Zanuar Riksa Aditya</td>
              <td class="px-6 py-4">Zanuar Riksa Aditya@gmail.com</td>
              <td class="px-6 py-4">Pemilik</td>
              <td class="px-6 py-4">
                <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
              </td>
            </tr>
            <tr data-category="User" data-blocked="false">
              <td class="px-6 py-4"></td>
              <td class="px-6 py-4">005</td>
              <td class="px-6 py-4">maharani Putri mindartik</td>
              <td class="px-6 py-4">maharani Putri mindartika@gmail.com</td>
              <td class="px-6 py-4">User</td>
              <td class="px-6 py-4">
                <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
              </td>
            </tr>
            <tr data-category="Pemilik" data-blocked="false">
              <td class="px-6 py-4"></td>
              <td class="px-6 py-4">006</td>
              <td class="px-6 py-4">Dewi Massitoh Trimuji</td>
              <td class="px-6 py-4">Suga@gmail.com</td>
              <td class="px-6 py-4">Pemilik</td>
              <td class="px-6 py-4">
                <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
              </td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <script>
    const filterDropdown = document.getElementById("categoryFilter");
    const tableRows = document.querySelectorAll("#accountTable tr");
    const searchInput = document.getElementById("searchInput");

    // Filter berdasarkan kategori
    filterDropdown.addEventListener("change", function() {
      const selectedCategory = this.value;
      tableRows.forEach(row => {
        const rowCategory = row.getAttribute("data-category");
        row.style.display = selectedCategory === "all" || rowCategory === selectedCategory ? "" : "none";
      });
    });

    // Fungsi untuk pencarian
    searchInput.addEventListener("input", function() {
      const searchQuery = this.value.toLowerCase();
      tableRows.forEach(row => {
        const userId = row.querySelector("td:nth-child(2)")?.textContent.toLowerCase() || "";
        const userName = row.querySelector("td:nth-child(3)")?.textContent.toLowerCase() || "";
        const email = row.querySelector("td:nth-child(4)")?.textContent.toLowerCase() || "";

        const matchesSearch = userId.includes(searchQuery) || userName.includes(searchQuery) || email.includes(searchQuery);
        row.style.display = matchesSearch ? "" : "none";
      });
    });

    // Event listener untuk tombol Banned
    document.querySelectorAll("#accountTable button").forEach(button => {
      button.addEventListener("click", function() {
        const row = this.closest("tr");
        const isBlocked = row.getAttribute("data-blocked") === "true";

        if (isBlocked) {
          // Unblock user
          row.style.backgroundColor = "";
          row.style.textDecoration = "";
          row.setAttribute("data-blocked", "false");
          this.textContent = "Banned";
          this.classList.remove("bg-green-500");
          this.classList.add("bg-red-500", "hover:bg-red-600");
        } else {
          // Block user
          row.style.backgroundColor = "#f8d7da";
          row.style.textDecoration = "line-through";
          row.setAttribute("data-blocked", "true");
          this.textContent = "Unblock";
          this.classList.remove("bg-red-500", "hover:bg-red-600");
          this.classList.add("bg-green-500");
        }
      });
    });
  </script>
</body>
<?php require './views/Components/Foot.php' ?>