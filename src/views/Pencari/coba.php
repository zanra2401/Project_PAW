<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Payment Selection</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <!-- Overlay -->
  <div id="popup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <!-- Pop-up Content -->
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
      <h2 class="text-lg font-semibold text-gray-800 mb-4">Pilih Metode Pembayaran</h2>
      <p class="text-gray-600 mb-6">Silakan pilih metode pembayaran yang Anda inginkan:</p>
      <div class="flex flex-col space-y-4">
        <button 
          id="offlineButton" 
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
        >
          Bayar Offline
        </button>
        <button 
          id="onlineButton" 
          class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition"
        >
          Bayar Online
        </button>
      </div>
      <button 
        id="closeButton" 
        class="mt-6 text-gray-500 hover:text-gray-800 text-sm"
      >
        Batalkan
      </button>
    </div>
  </div>

  <!-- Trigger Button -->
  <button 
    id="openPopup" 
    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
  >
    Pilih Pembayaran
  </button>

  <script>
    const popup = document.getElementById('popup');
    const openPopup = document.getElementById('openPopup');
    const closeButton = document.getElementById('closeButton');
    const offlineButton = document.getElementById('offlineButton');
    const onlineButton = document.getElementById('onlineButton');

    openPopup.addEventListener('click', () => {
      popup.classList.remove('hidden');
    });

    closeButton.addEventListener('click', () => {
      popup.classList.add('hidden');
    });

    offlineButton.addEventListener('click', () => {
      alert('Anda memilih bayar offline.');
      popup.classList.add('hidden');
    });

    onlineButton.addEventListener('click', () => {
      alert('Anda memilih bayar online.');
      popup.classList.add('hidden');
    });
  </script>

</body>
</html>
