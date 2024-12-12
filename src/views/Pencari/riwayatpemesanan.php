<?php require './views/Components/Head.php' ?>

<body class="bg-gray-100 flex flex-col items-center">
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="container mx-auto p-10">
        <div class="bg-white shadow-md rounded-lg p-8 w-fit mx-auto">
            <!-- Search Bar -->
            <div>
                <label class="block mb-4 font-medium text-gray-700 text-center text-sm">Riwayat Pesanan Kost</label>
                <input type="text" id="searchInput"
                    class="block mx-auto w-fit px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm"
                    placeholder="Masukkan nama kost...">
            </div>

            <!-- Booking Cards -->
            <div id="bookingCards" class="mt-8 space-y-4 flex flex-col items-center">
                <div class="bg-gray-50 shadow-md rounded-lg p-3 w-fit text-center text-sm" data-location="Surabaya">
                    <h2 class="text-base font-bold text-gray-800">Kosan Mawar</h2>
                    <p class="text-xs text-gray-600">ID Kost: 001</p>
                    <p class="text-xs text-gray-600">Lokasi: Surabaya</p>
                    <p class="text-xs text-gray-600">Harga: Rp 1,500,000</p>
                    <p class="text-xs text-gray-600">Tanggal Pemesanan: 2024-01-15</p>
                    <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-xs"
                        style="background-color: #68422d;">Nilai</button>

                </div>

                <div class="bg-gray-50 shadow-md rounded-lg p-3 w-fit text-center text-sm" data-location="Malang">
                    <h2 class="text-base font-bold text-gray-800">Kosan Melati</h2>
                    <p class="text-xs text-gray-600">ID Kost: 002</p>
                    <p class="text-xs text-gray-600">Lokasi: Malang</p>
                    <p class="text-xs text-gray-600">Harga: Rp 1,200,000</p>
                    <p class="text-xs text-gray-600">Tanggal Pemesanan: 2024-02-10</p>
                    <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-xs"
                        style="background-color: #68422d;">Nilai</button>

                </div>

                <div class="bg-gray-50 shadow-md rounded-lg p-3 w-fit text-center text-sm" data-location="Surabaya">
                    <h2 class="text-base font-bold text-gray-800">Kosan Dahlia</h2>
                    <p class="text-xs text-gray-600">ID Kost: 003</p>
                    <p class="text-xs text-gray-600">Lokasi: Surabaya</p>
                    <p class="text-xs text-gray-600">Harga: Rp 1,000,000</p>
                    <p class="text-xs text-gray-600">Tanggal Pemesanan: 2024-03-05</p>
                    <button class="mt-2 px-3 py-1 text-white rounded-lg hover:bg-opacity-90 text-xs"
                        style="background-color: #68422d;">Nilai</button>

                </div>
            </div>
        </div>
    </div>

    <script>
    const searchInput = document.getElementById("searchInput");
    const bookingCards = document.querySelectorAll("#bookingCards > div");

    // Filter cards based on search query
    searchInput.addEventListener("input", function() {
        const searchQuery = this.value.toLowerCase();
        bookingCards.forEach(card => {
            const kostName = card.querySelector("h2").textContent.toLowerCase();
            const matchesSearch = kostName.includes(searchQuery);
            card.style.display = matchesSearch ? "block" : "none";
        });
    });
    </script>
</body>

</html>
<?php require './views/Components/Foot.php' ?>