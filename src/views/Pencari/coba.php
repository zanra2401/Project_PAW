<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Button Click and Modal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Fungsi untuk menampilkan modal
    function openModal() {
      const modal = document.getElementById('myModal');
      modal.classList.remove('hidden'); // Menghapus kelas 'hidden' untuk menampilkan modal
      modal.classList.add('flex'); // Menambahkan kelas 'flex' untuk menampilkan modal
    }

    // Fungsi untuk menutup modal
    function closeModal() {
      const modal = document.getElementById('myModal');
      modal.classList.remove('flex'); // Menghapus kelas 'flex' untuk menyembunyikan modal
      modal.classList.add('hidden'); // Menambahkan kelas 'hidden' untuk menyembunyikan modal
    }
  </script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <!-- Tombol untuk membuka modal -->
  <button onclick="openModal()" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-300">
    Klik untuk buka modal
  </button>

  <!-- Modal (Dialog) -->
  <div id="myModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center z-50 transition-all duration-300">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
      <h2 class="text-2xl font-semibold text-center mb-4">Modal Dialog</h2>
      <p class="text-gray-700 mb-4">Ini adalah contoh dialog/modal yang muncul setelah tombol diklik.</p>
      <div class="text-center">
        <button onclick="closeModal()" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
          Tutup
        </button>
      </div>
    </div>
  </div>

</body>
</html>
