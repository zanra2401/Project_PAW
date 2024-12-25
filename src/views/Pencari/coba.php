<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Denah Kost</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="container mx-auto p-4">
    <!-- Atap -->
    <div class="relative flex justify-center">
      <div class="w-1/2 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-red-500"></div>
    </div>
    
    <!-- Dinding Rumah -->
    <div class="bg-white border-4 border-gray-700 rounded-b-lg shadow-lg p-6 mt-1">
      <h1 class="text-2xl font-bold text-center mb-6">Denah Kost</h1>
      
      <!-- Lantai 1 -->
      <div class="mb-8">
        <h2 class="text-lg font-semibold mb-4 text-center">Lantai 1</h2>
        <div class="grid grid-cols-7 gap-4">
          <!-- Contoh kamar lantai 1 -->
          <div class="bg-white border border-[#83493d] rounded-lg shadow p-4 text-center">
            <p class="text-lg font-semibold">Kamar 101</p>
            <p class="text-sm">Tersedia</p>
          </div>
          <div class="bg-[#83493d] border border-[#83493d] rounded-lg shadow p-4 text-center text-white">
            <p class="text-lg font-semibold">Kamar 102</p>
            <p class="text-sm">Tidak Tersedia</p>
          </div>
          <div class="bg-green-200 border border-green-400 rounded-lg shadow p-4 text-center">
            <p class="text-lg font-semibold">Kamar 103</p>
            <p class="text-sm text-green-600">Tersedia</p>
          </div>
          <!-- Tambahkan kamar lainnya sesuai kebutuhan -->
        </div>
      </div>

      <!-- Lantai 2 -->
      <div>
        <h2 class="text-lg font-semibold mb-4 text-center">Lantai 2</h2>
        <div class="grid grid-cols-7 gap-4">
          <!-- Contoh kamar lantai 2 -->
          <div class="bg-green-200 border border-green-400 rounded-lg shadow p-4 text-center">
            <p class="text-lg font-semibold">Kamar 201</p>
            <p class="text-sm text-green-600">Tersedia</p>
          </div>
          <div class="bg-red-200 border border-red-400 rounded-lg shadow p-4 text-center">
            <p class="text-lg font-semibold">Kamar 202</p>
            <p class="text-sm text-red-600">Tidak Tersedia</p>
          </div>
          <div class="bg-green-200 border border-green-400 rounded-lg shadow p-4 text-center">
            <p class="text-lg font-semibold">Kamar 203</p>
            <p class="text-sm text-green-600">Tersedia</p>
          </div>
          <!-- Tambahkan kamar lainnya sesuai kebutuhan -->
        </div>
      </div>

    </div>
  </div>
</body>
</html>
