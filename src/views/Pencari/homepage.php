<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Akun</h1>
   
    <!-- Dropdown and Header -->
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
        <input type="text" id="searchInput" class="block w-64 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" ">
      </div>

    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">
             
            </th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">ID User</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">User Name</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Email</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Role</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Action</th>
          </tr>
        </thead>
        <tbody id="accountTable" class="bg-white divide-y divide-gray-200">
          <tr data-category="Pemilik">
            <td class="px-6 py-4">
             
            </td>
            <td class="px-6 py-4">001</td>
            <td class="px-6 py-4">Danendra Mahardhika</td>
            <td class="px-6 py-4">danendra.mahardhika@gmail.com</td>
            <td class="px-6 py-4">Pemilik</td>
            <td class="px-6 py-4">
              <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
            </td>
          </tr>
          <tr data-category="User">
            <td class="px-6 py-4">
             
            </td>
            <td class="px-6 py-4">002</td>
            <td class="px-6 py-4">Nabilah Rizqi Amalia</td>
            <td class="px-6 py-4">nabilah.rizqi.amalia@gmail.com</td>
            <td class="px-6 py-4">User</td>
            <td class="px-6 py-4">
              <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
            </td>
          </tr>
          <tr data-category="Pemilik">
            <td class="px-6 py-4">
             
            </td>
            <td class="px-6 py-4">003</td>
            <td class="px-6 py-4">Tuhu Pangestu</td>
            <td class="px-6 py-4">tuhu.pangestu@gmail.com</td>
            <td class="px-6 py-4">Pemilik</td>
            <td class="px-6 py-4">
              <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
            </td>
          </tr>
          <tr data-category="User">
            <td class="px-6 py-4">
             
            </td>
            <td class="px-6 py-4">004</td>
            <td class="px-6 py-4">Zanuar Riksa Aditya</td>
            <td class="px-6 py-4">zanuar.riksa.aditya@gmail.com</td>
            <td class="px-6 py-4">User</td>
            <td class="px-6 py-4">
              <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
            </td>
          </tr>
          <tr data-category="User">
            <td class="px-6 py-4">
             
            </td>
            <td class="px-6 py-4">005</td>
            <td class="px-6 py-4">maharani Putri mindartik</td>
            <td class="px-6 py-4">rara@gmail.com</td>
            <td class="px-6 py-4">User</td>
            <td class="px-6 py-4">
              <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
            </td>
          </tr>
          <tr data-category="Pemilik">
            <td class="px-6 py-4">
             
            </td>
            <td class="px-6 py-4">006</td>
            <td class="px-6 py-4">Dewi Massitoh Trimuji</td>
            <td class="px-6 py-4">suga@gmail.com</td>
            <td class="px-6 py-4">Pemilik</td>
            <td class="px-6 py-4">
              <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Banned</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script>
  const filterDropdown = document.getElementById("categoryFilter");
  const tableRows = document.querySelectorAll("#accountTable tr");
  const searchInput = document.getElementById("searchInput"); // Ambil elemen input search

  // Filter berdasarkan kategori
  filterDropdown.addEventListener("change", function () {
    const selectedCategory = this.value;
    tableRows.forEach(row => {
      const rowCategory = row.getAttribute("data-category");
      const matchesCategory = selectedCategory === "all" || rowCategory === selectedCategory;

      row.style.display = matchesCategory ? "" : "none";
    });
  });

  // Fungsi untuk pencarian (angka dan huruf)
  searchInput.addEventListener("input", function () {
    const searchQuery = this.value.toLowerCase();
    tableRows.forEach(row => {
      const userId = row.querySelector("td:nth-child(2)").textContent.toLowerCase(); // Kolom ID User
      const userName = row.querySelector("td:nth-child(3)").textContent.toLowerCase(); // Kolom User Name
      const email = row.querySelector("td:nth-child(4)").textContent.toLowerCase(); // Kolom Email
      const role = row.querySelector("td:nth-child(5)").textContent.toLowerCase(); // Kolom Role

      // Pencocokan angka dan huruf
      const matchesSearch = 
        userId.includes(searchQuery) || 
        userName.includes(searchQuery) || 
        email.includes(searchQuery) ||
        role.includes(searchQuery); // Tambahkan pencarian untuk Role
      
      row.style.display = matchesSearch ? "" : "none"; // Menyembunyikan atau menampilkan baris
    });
  });

  // Event listener untuk tombol Banned
  document.querySelectorAll("#accountTable button").forEach(button => {
    button.addEventListener("click", function () {
      const row = this.closest("tr"); // Dapatkan baris terkait tombol

      if (row.getAttribute("data-blocked") === "true") {
        // Jika akun diblokir, lakukan unblock
        row.style.backgroundColor = ""; // Reset warna latar belakang
        row.style.textDecoration = ""; // Hapus efek coret pada teks
        row.setAttribute("data-blocked", "false"); // Tandai sebagai tidak diblokir

        // Ubah tombol menjadi status "Banned" (merah)
        this.textContent = "Banned";
        this.disabled = false; // Aktifkan kembali tombol
        this.classList.remove("bg-green-500", "hover:bg-green-400");
        this.classList.add("bg-red-500");
      } else {
        // Jika akun belum diblokir, lakukan blokir
        row.style.backgroundColor = "#f8d7da"; // Ubah warna latar belakang untuk menunjukkan diblokir
        row.style.textDecoration = "line-through"; // Beri efek coret pada teks
        row.setAttribute("data-blocked", "true"); // Tandai sebagai diblokir

        // Ubah tombol menjadi status "Unblock" (hijau)
        this.textContent = "Unblock";
        this.disabled = false; // Tetap bisa diaktifkan untuk unblock
        this.classList.remove("bg-red-500", "hover:bg-red-600");
        this.classList.add("bg-green-500");
      }

      // Hilangkan efek hover secara permanen
      this.classList.remove("hover:bg-green-400", "hover:bg-red-600");
    });
  });



</script>

</body>
</html>
